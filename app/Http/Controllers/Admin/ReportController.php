<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Adoption;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display reports dashboard
     */
    public function index()
    {
        // Summary statistics
        $totalUsers = User::count();
        $totalPurchases = Purchase::count();
        $totalAdoptions = Adoption::count();
        $pendingPurchases = Purchase::where('status', 'pending')->count();
        $pendingAdoptions = Adoption::where('status', 'pending')->count();
        $completedPurchases = Purchase::where('status', 'completed')->count();
        $completedAdoptions = Adoption::where('status', 'approved')->count();
        $rejectedAdoptions = Adoption::where('status', 'rejected')->count();

        // Revenue from purchases
        $totalRevenue = Purchase::where('status', 'completed')->sum('amount');

        return view('admin.reports.index', compact(
            'totalUsers',
            'totalPurchases',
            'totalAdoptions',
            'pendingPurchases',
            'pendingAdoptions',
            'completedPurchases',
            'completedAdoptions',
            'rejectedAdoptions',
            'totalRevenue'
        ));
    }

    /**
     * Show purchases report
     */
    public function purchases(Request $request)
    {
        $query = Purchase::with(['user', 'pet']);

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by date range
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $purchases = $query->latest()->paginate(20);

        return view('admin.reports.purchases', compact('purchases'));
    }

    /**
     * Show adoptions report
     */
    public function adoptions(Request $request)
    {
        $query = Adoption::with(['user', 'pet']);

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by date range
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $adoptions = $query->latest()->paginate(20);

        return view('admin.reports.adoptions', compact('adoptions'));
    }

    /**
     * Show users report
     */
    public function users(Request $request)
    {
        $query = User::query();

        // Filter by search
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        $users = $query->with(['adoptions', 'purchases'])->paginate(20);

        return view('admin.reports.users', compact('users'));
    }

    /**
     * Export purchases as CSV
     */
    public function exportPurchases()
    {
        $purchases = Purchase::with(['user', 'pet'])->get();

        $csv = "ID,User,Email,Pet,Amount,Status,Date\n";
        foreach ($purchases as $purchase) {
            $csv .= "{$purchase->id},{$purchase->user->name},{$purchase->user->email},{$purchase->pet->name},{$purchase->amount},{$purchase->status},{$purchase->created_at->format('Y-m-d')}\n";
        }

        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="purchases_report.csv"');
    }

    /**
     * Export adoptions as CSV
     */
    public function exportAdoptions()
    {
        $adoptions = Adoption::with(['user', 'pet'])->get();

        $csv = "ID,User,Email,Pet,Status,Date\n";
        foreach ($adoptions as $adoption) {
            $csv .= "{$adoption->id},{$adoption->user->name},{$adoption->user->email},{$adoption->pet->name},{$adoption->status},{$adoption->created_at->format('Y-m-d')}\n";
        }

        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="adoptions_report.csv"');
    }
}
