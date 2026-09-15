<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Prescription;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPrescriptions = Prescription::count();

        $todayPrescriptions = Prescription::whereDate('created_at', today())->count();

        $monthPrescriptions = Prescription::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $totalAmountDue = Prescription::sum('amount_due');

        $recentPrescriptions = Prescription::latest()
            ->take(5)
            ->get();

        $recentActivities = ActivityLog::with('user', 'subject')
            ->latest('created_at')
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'totalPrescriptions',
            'todayPrescriptions',
            'monthPrescriptions',
            'totalAmountDue',
            'recentPrescriptions',
            'recentActivities'
        ));
    }
}