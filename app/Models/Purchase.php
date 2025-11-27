<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id','pet_id','amount','status',
        'mpesa_checkout_request_id','mpesa_transaction_id','mpesa_response'
    ];

    public function pet() { return $this->belongsTo(Pet::class); }
    public function user() { return $this->belongsTo(User::class); }
}
