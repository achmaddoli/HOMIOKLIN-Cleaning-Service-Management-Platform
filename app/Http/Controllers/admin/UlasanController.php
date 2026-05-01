<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UlasanController extends Controller
{
    public function index()
    {
        $data = Testimonial::all();
        // Folder view diubah
        return view('admin.ulasan.index', ['testimonials' => $data]);
    }

    public function create(string $booking_id)
    {
        //
    }

    public function store(Request $request, string $booking_id)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.ulasan.edit', compact('testimonial'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'description' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $type = Testimonial::findOrFail($id);
        $type->update($request->all());

        return redirect()->route('admin.testimonial.index')->with('success', 'Ulasan/Testimoni berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->route('admin.testimonial.index')->with('success', 'Ulasan/Testimoni berhasil dihapus.');
    }
}