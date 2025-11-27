<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MpesaController extends Controller
{
    // Generate Access Token
    private function accessToken()
    {
        $consumerKey = env('MPESA_CONSUMER_KEY');
        $consumerSecret = env('MPESA_CONSUMER_SECRET');

        if (!$consumerKey || !$consumerSecret) {
            Log::error("⚠️ Mpesa credentials missing in .env");
            return null;
        }

        $credentials = base64_encode("$consumerKey:$consumerSecret");

        $response = Http::withHeaders([
            'Authorization' => 'Basic '.$credentials
        ])->get(
            'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
        );

        $json = $response->json();
        Log::info("🔐 ACCESS TOKEN RESPONSE", ['response' => $json]);

        if (!$response->successful() || !isset($json['access_token'])) {
            Log::error("❌ ACCESS TOKEN FAILED", ['response' => $json]);
            return null;
        }

        return $json['access_token'];
    }

    // STK Push Request
    public function stkPush($phone, $amount)
    {
        $accessToken = $this->accessToken();

        if (!$accessToken) {
            return ["error" => "Failed to generate access token"];
        }

        $shortcode = env('MPESA_SHORTCODE');
        $passkey   = env('MPESA_PASSKEY');

        $timestamp = date('YmdHis');
        $password = base64_encode($shortcode.$passkey.$timestamp);

        // Normalize and validate amount: Daraja expects an integer amount (no decimals)
        $amountFloat = floatval($amount);
        $amountInt = (int) round($amountFloat);
        if ($amountInt <= 0) {
            Log::error('❌ STK Push aborted - invalid amount', ['original' => $amount]);
            return ['error' => 'Invalid amount provided for STK Push'];
        }

        $phone = $this->formatPhone($phone);

        $response = Http::withToken($accessToken)->post(
            'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest',
            [
                "BusinessShortCode" => $shortcode,
                "Password" => $password,
                "Timestamp" => $timestamp,
                "TransactionType" => "CustomerPayBillOnline",
                "Amount" => $amountInt,
                "PartyA" => $phone,
                "PartyB" => $shortcode,
                "PhoneNumber" => $phone,
                "CallBackURL" => trim(env('MPESA_CALLBACK_URL')),
                "AccountReference" => "PetPurchase",
                "TransactionDesc" => "Pet Purchase"
            ]
        );

        $json = $response->json();
        Log::info("📲 STK PUSH RESPONSE", ['response' => $json]);

        return $json;
    }

    private function formatPhone($phone)
    {
        // Remove spaces
        $phone = preg_replace('/\s+/', '', $phone);

        // Convert 07xx to 2547xx
        if (substr($phone, 0, 1) === '0') {
            return '254' . substr($phone, 1);
        }

        return $phone;
    }

    // Callback Receiver
    public function callback(Request $request)
    {
        Log::info("🔁 M-Pesa Callback Response", $request->all());
        return response()->json(["message" => "Callback received"]);
    }
}
