<?php

namespace App\Http\Controllers\Pekerja;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\RekapCleaner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PekerjaBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('customer', 'category')
            ->whereIn('status', ['Diterima', 'Diproses', 'Selesai', 'Dibayar'])
            ->get();
        return view('pekerja.booking.index', compact('bookings'));
    }

    public function selesai(string $id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => 'Selesai'
        ]);

        // Update status rekap cleaner menjadi 'Available'
        $cleanerId = Auth::id();
        RekapCleaner::where('cleaner_id', $cleanerId)
            ->update(['status' => 'Available']);

        $cleaningReport = $booking->cleaningReport;
        if ($cleaningReport) {
            $cleaningReport->update([
                'completion_date' => Carbon::now('Asia/Jakarta')
            ]);
        }

        // Teks WhatsApp disesuaikan untuk Homioklin Cleaning Service
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $booking->customer->hp,
                'message' => 'Halo Kak ' . $booking->customer->name . ",\n\n" . 'Kami dari tim *HOMIOKLIN* ingin memberitahukan bahwa layanan pembersihan properti Anda telah selesai kami kerjakan.' . "\n" .
                    'Silakan periksa hasilnya dan lakukan proses pembayaran sebesar *Rp ' . number_format($booking->cleaningReport->total_cost, 0, ',', '.') . '*.' . "\n\n" . 'Detail rincian dapat Anda cek melalui dashboard website kami.' . "\n\n" . 'Terima kasih telah mempercayakan kebersihan properti Anda kepada kami! ✨',
                'countryCode' => '62',
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: s58MvH3pRf2kDJ8vZub4'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return redirect()->route('teknisi.booking.index')->with('success', 'Layanan telah diselesaikan dan pesan WhatsApp otomatis telah terkirim ke pelanggan.');
    }

    public function show($id)
    {
        // Panggil relasi cleaningReport
        $booking = Booking::with(['images', 'cleaningReport', 'category', 'customer', 'payment'])
            ->findOrFail($id);

        return view('pekerja.booking.detail', compact('booking'));
    }
}
