<?php

namespace App\Http\Controllers\User;

use App\Models\Booking;
use App\Models\BookingImage;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('customer', 'category')->get();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $categories = ServiceCategory::all();
        return view('user.booking', compact('categories'));
    }

    // Menyimpan booking baru ke database menggunakan skema HOMIOKLIN
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:service_categories,id',
            'property_type' => 'required|string',
            'room_area' => 'required|string',
            'room_condition' => 'required|string',
            'booking_date' => 'required|date',
            'notes' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:10048',
        ]);

        $booking = Booking::create([
            'customer_id' => Auth::id(),
            'category_id' => $request->category_id,
            'property_type' => $request->property_type,
            'room_area' => $request->room_area,
            'room_condition' => $request->room_condition,     
            'status' => 'Menunggu',
            'booking_date' => $request->booking_date,
            'notes' => $request->notes ?: 'Tidak ada catatan',
        ]);

        // Simpan gambar jika ada
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);

                // Buat entri di tabel booking_images
                BookingImage::create([
                    'booking_id' => $booking->id,
                    'image' => $imageName,
                ]);
            }
        }

        return redirect()->route('home')->with('success', 'Booking layanan kebersihan berhasil dibuat.');
    }
}
