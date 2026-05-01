<?php

namespace App\Http\Controllers\Pekerja;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Booking;
use App\Models\RekapCleaner;
use Illuminate\Http\Request;
use App\Models\CleaningReport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PekerjaDashboardController extends Controller
{
    public function index(Request $request) 
    {
        $totalBooking = Booking::count();
        $totalMenunggu = Booking::where('status', 'Menunggu')->count();
        $totalDiterima = Booking::where('status', 'Diterima')->count();
        $totalProses = Booking::where('status', 'Diproses')->count();
        $totalSelesai = Booking::where('status', 'Selesai')->count();
        $totalDibayar = Booking::where('status', 'Dibayar')->count();

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

        $bookingsData = [];

        for ($month = 1; $month <= 12; $month++) {
            $bookingsData[] = $bookingsPerMonth[$month] ?? 0;
        }

        $filterMonth = $request->input('month');

        // Panggil Model RekapCleaner & relasi 'cleaner'
        $rekapTeknisi = RekapCleaner::with('cleaner')
            ->get()
            ->map(function ($rekap) use ($filterMonth) {
                // Panggil CleaningReport
                $totalService = CleaningReport::where('cleaner_id', $rekap->cleaner_id)->count();

                $monthlyServiceQuery = CleaningReport::where('cleaner_id', $rekap->cleaner_id);
                if ($filterMonth) {
                    $monthlyServiceQuery->whereMonth('process_date', $filterMonth);
                } else {
                    $monthlyServiceQuery->whereMonth('process_date', Carbon::now()->month);
                }

                $monthlyService = $monthlyServiceQuery->count();

                return [
                    'name' => $rekap->cleaner->name,
                    'total_service' => $totalService,
                    'monthly_service' => $monthlyService,
                    'status' => $rekap->status,
                ];
            });

        if ($request->ajax()) {
            return response()->json($rekapTeknisi);
        }

        return view('pekerja.dashboard', compact(
            'totalBooking', 'totalMenunggu', 'totalDiterima', 'totalProses', 'totalSelesai', 'totalDibayar',  'bookingsData', 'currentYear', 'rekapTeknisi'
        ));
    }
}