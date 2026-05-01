<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\CleaningReport;
use App\Models\ServiceCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index() 
    {
        $totalBooking = Booking::count();
        $totalMenunggu = Booking::where('status', 'Menunggu')->count();
        $totalDiterima = Booking::where('status', 'Diterima')->count();
        $totalProses = Booking::where('status', 'Diproses')->count();
        $totalSelesai = Booking::where('status', 'Selesai')->count();
        $totalDibayar = Booking::where('status', 'Dibayar')->count();

        $roleUserCount = User::whereHas('role', function ($query) {
            $query->where('name', 'user');
        })->count();

        $roleCleanerCount = User::whereHas('role', function ($query) {
            $query->where('name', 'cleaner'); 
        })->count();

        $totalPendapatan = CleaningReport::sum('total_cost');

        $currentYear = Carbon::now()->year;

        $bookingsPerMonth = Booking::select(
                DB::raw('MONTH(booking_date) as month'),
                DB::raw('COUNT(id) as total_bookings')
            )
            ->whereYear('booking_date', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('total_bookings', 'month')
            ->toArray();

        $revenuePerMonth = CleaningReport::select(
                DB::raw('MONTH(process_date) as month'),
                DB::raw('SUM(total_cost) as total_revenue')
            )
            ->whereYear('process_date', $currentYear)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('total_revenue', 'month')
            ->toArray();

        $bookingsData = [];
        $revenueData = [];

        for ($month = 1; $month <= 12; $month++) {
            $bookingsData[] = $bookingsPerMonth[$month] ?? 0;
            $revenueData[] = $revenuePerMonth[$month] ?? 0;
        }

        return view('admin.dashboard', compact(
            'totalBooking', 'totalMenunggu', 'totalDiterima', 'totalProses', 'totalSelesai', 'totalDibayar', 
            'roleUserCount', 'roleCleanerCount', 'totalPendapatan', 'bookingsData', 'revenueData', 'currentYear'
        ));
    }
}