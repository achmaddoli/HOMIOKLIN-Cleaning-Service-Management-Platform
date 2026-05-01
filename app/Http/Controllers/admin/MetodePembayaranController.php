<?php

namespace App\Http\Controllers\Admin;

use App\Models\PaymentType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MetodePembayaranController extends Controller
{
    public function index()
    {
        $data = PaymentType::all();
        // Folder view diubah
        return view('admin.metode_pembayaran.index', ['types' => $data]);
    }

    public function create()
    {
        return view('admin.metode_pembayaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        PaymentType::create([
            'name' => $request->name,
        ]);

        return redirect()->route('type.index')->with('success', 'Metode pembayaran berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $type = PaymentType::findOrFail($id);
        return view('admin.metode_pembayaran.edit', compact('type'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $type = PaymentType::findOrFail($id);
        $type->update($request->all());

        return redirect()->route('type.index')->with('success', 'Metode pembayaran berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $type = PaymentType::findOrFail($id);
        $type->delete();

        return redirect()->route('type.index')->with('success', 'Metode pembayaran berhasil dihapus.');
    }
}