<?php

namespace App\Http\Controllers\Pekerja;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\RekapCleaner;
use Illuminate\Http\Request;
use App\Models\CleaningReport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LaporanPekerjaanController extends Controller
{
    public function index()
    {
        $data = CleaningReport::all();
        return view('pekerja.report.index', ['reports' => $data]);
    }

    public function create(string $booking_id)
    {
        $bookings = Booking::findOrFail($booking_id);
        return view('pekerja.report.create', compact('bookings'));
    }

    public function store(Request $request, string $booking_id)
    {
        // Validasi tetap menggunakan name dari form blade
        $request->validate([
            'initial_condition' => 'required',
            'cleaning_action' => 'required',
            'time_estimate' => 'required',
            'service_cost' => 'required|numeric',
            'additional_cost' => 'required|numeric',
        ]);

        $total = $request->service_cost + $request->additional_cost;

        // Simpan laporan ke database baru (Mapping form name ke column database)
        $report = CleaningReport::create([
            'booking_id' => $booking_id,
            'cleaner_id' => Auth::id(),
            'initial_condition' => $request->initial_condition,
            'cleaning_action' => $request->cleaning_action,
            'time_estimate' => $request->time_estimate,
            'process_date' => Carbon::now('Asia/Jakarta'),
            'completion_date' => null,
            'service_cost' => $request->service_cost,
            'additional_cost' => $request->additional_cost,
            'total_cost' => $total,
        ]);

        $booking = Booking::findOrFail($booking_id);
        $booking->update(['status' => 'Diproses']);

        $cleanerId = Auth::id();
        RekapCleaner::where('cleaner_id', $cleanerId)
            ->update(['status' => 'On Job']);

        return redirect()->route('teknisi.booking.index')->with('success', 'Pekerjaan diproses dan Laporan berhasil ditambah');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id, string $booking_id)
    {
        $bookings = Booking::findOrFail($booking_id);
        $report = CleaningReport::findOrFail($id);

        return view('pekerja.report.edit', compact('bookings', 'report'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'initial_condition' => 'required',
            'cleaning_action' => 'required',
            'time_estimate' => 'required',
            'service_cost' => 'required|numeric',
            'additional_cost' => 'required|numeric',
        ]);

        $total = $request->service_cost + $request->additional_cost;
        $report = CleaningReport::findOrFail($id);

        $report->update([
            'initial_condition' => $request->initial_condition,
            'cleaning_action' => $request->action_taken,
            'time_estimate' => $request->cleaning_action,
            'service_cost' => $request->service_cost,
            'additional_cost' => $request->additional_cost,
            'total_cost' => $total,
        ]);

        return redirect()->route('teknisi.booking.index')->with('success', 'Laporan pekerjaan berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        //
    }
}
