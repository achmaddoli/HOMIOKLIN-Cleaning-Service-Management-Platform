<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\PaymentType;
use Illuminate\Http\Request;
use App\Models\CleaningReport;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('admin.pembayaran.index', compact('payments'));
    }

    public function create(string $booking_id)
    {
        $bookings = Booking::findOrFail($booking_id);
        $types = PaymentType::all();
        $report = CleaningReport::where('booking_id', $booking_id)->first();
        return view('admin.pembayaran.create', compact('bookings', 'types', 'report'));
    }

    public function store(Request $request, string $booking_id)
    {
        $request->validate([
            'payment_type_id' => 'required|exists:payment_types,id',
            'amount' => 'required|numeric',
        ]);
        
        $report = CleaningReport::where('booking_id', $booking_id)->firstOrFail();

        if ($request->amount < $report->total_cost) {
            return redirect()->back()->with('error', 'Uang yang diterima tidak cukup. Silakan periksa kembali.')->withInput();
        }

        $changeAmount = $request->amount - $report->total_cost;

        Payment::create([
            'payment_type_id' => $request->payment_type_id,
            'booking_id' => $booking_id,
            'amount' => $request->amount,
            'change_amount' => $changeAmount,
            'payment_date' => Carbon::now('Asia/Jakarta'),
        ]);

        $booking = Booking::findOrFail($booking_id);
        $booking->update(['status' => 'Dibayar']);

        return redirect()->route('payment.index')->with('success', 'Transaksi berhasil diselesaikan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id, $booking_id)
    {
        $payment = Payment::findOrFail($id);
        $bookings = Booking::findOrFail($booking_id);
        $types = PaymentType::all();
        $report = CleaningReport::where('booking_id', $booking_id)->first();
        return view('admin.pembayaran.edit', compact('bookings', 'types', 'report', 'payment'));
    }

    public function update(Request $request, string $id, string $booking_id)
    {
        $request->validate([
            'payment_type_id' => 'required|exists:payment_types,id',
            'amount' => 'required|numeric',
        ]);
        
        $report = CleaningReport::where('booking_id', $booking_id)->firstOrFail();

        if ($request->amount < $report->total_cost) {
            return redirect()->back()->with('error', 'Uang yang diterima tidak cukup. Silakan periksa kembali.')->withInput();
        }

        $changeAmount = $request->amount - $report->total_cost;

        $payment = Payment::findOrFail($id);
        $payment->update([
            'payment_type_id' => $request->payment_type_id,
            'amount' => $request->amount,
            'change_amount' => $changeAmount
        ]);

        return redirect()->route('payment.index')->with('success', 'Pembayaran berhasil diubah.');
    }

    public function destroy(string $id)
    {
        //
    }
}