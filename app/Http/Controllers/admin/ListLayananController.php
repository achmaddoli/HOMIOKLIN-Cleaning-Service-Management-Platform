<?php

namespace App\Http\Controllers\Admin;

use App\Models\ListService;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Http\Controllers\Controller;

class ListLayananController extends Controller
{
    public function index()
    {
        $listServices = ListService::with('category')->get();
        return view('admin.layanan.index', compact('listServices'));
    }

    public function create()
    {
        $categories = ServiceCategory::all();
        return view('admin.layanan.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:service_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'time_estimate' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        ListService::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'time_estimate' => $request->time_estimate,
            'price' => $request->price,
        ]);

        return redirect()->route('admin.list.index')->with('success', 'Layanan baru berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $listService = ListService::findOrFail($id);
        $categories = ServiceCategory::all();
        return view('admin.layanan.edit', compact('listService', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_id' => 'required|exists:service_categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'time_estimate' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $listService = ListService::findOrFail($id);
        $listService->update($request->all());

        return redirect()->route('admin.list.index')->with('success', 'Layanan berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $listService = ListService::findOrFail($id);
        $listService->delete();

        return redirect()->route('admin.list.index')->with('success', 'Layanan berhasil dihapus.');
    }
}