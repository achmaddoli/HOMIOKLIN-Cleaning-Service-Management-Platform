<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class KategoriLayananController extends Controller
{
    public function index()
    {
        $data = ServiceCategory::all();
        // Folder view diubah
        return view('admin.kategori_layanan.index', ['categories' => $data]);
    }

    public function create()
    {
        return view('admin.kategori_layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
        ]);

        ServiceCategory::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('category')->with('success', 'Kategori Layanan berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $category = ServiceCategory::findOrFail($id);
        return view('admin.kategori_layanan.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = ServiceCategory::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('category')->with('success', 'Kategori Layanan berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $category = ServiceCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('category')->with('success', 'Kategori Layanan berhasil dihapus.');
    }
}