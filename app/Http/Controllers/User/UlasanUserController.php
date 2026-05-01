<?php

namespace App\Http\Controllers\User;

use App\Models\Booking;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UlasanUserController extends Controller
{
    public function index()
    {
        //
    }

    public function create(string $booking_id)
    {
        $bookings = Booking::findOrFail($booking_id);
        return view('admin.ulasan.create', compact('bookings'));
    }

    public function store(Request $request, string $booking_id)
    {
        $request->validate([
            'description' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Testimonial::create([
            'booking_id' => $booking_id,
            'testimoni_date' => now(),
            'description' => $request->description,
            'rating' => $request->rating,
        ]);

        return redirect()->route('user.booking.show', $booking_id)->with('success', 'Ulasan berhasil ditambahkan! Terima kasih.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id, $booking_id)
    {
        $bookings = Booking::findOrFail($booking_id);
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.ulasan.edit', compact('bookings', 'testimonial'));
    }

    public function update(Request $request, string $id, string $booking_id)
    {
        $request->validate([
            'description' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $type = Testimonial::findOrFail($id);
        $type->update($request->all());

        return redirect()->route('user.booking.show', $booking_id)->with('success', 'Ulasan berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        //
    }
}
