<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\RekapCleaner;
use Illuminate\Http\Request;
use App\Models\CleaningReport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserCleanerController extends Controller
{
    public function index()
    {
        $teknisis = User::whereHas('role', function ($query) {
            $query->where('name', 'cleaner');
        })->get();

        return view('admin.userPekerja.index', compact('teknisis'));
    }

    public function rekap(Request $request)
    {
        $filterMonth = $request->input('month');

        $rekapTeknisi = RekapCleaner::with('cleaner')
            ->get()
            ->map(function ($rekap) use ($filterMonth) {
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

        return view('admin.rekap_pekerja.index', compact('rekapTeknisi'));
    }

    public function create()
    {
        return view('admin.userPekerja.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'hp' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed'],
        ]);

        $teknisi = User::create([
            'name' => $request->name,
            'hp' => $request->hp,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'role_id' => 2,
            'password' => Hash::make($request->password),
        ]);

        RekapCleaner::create([
            'cleaner_id' => $teknisi->id,
            'status' => 'Available'
        ]);

        return redirect()->route('user.teknisi.index')->with('success', 'Akun Pekerja Lapangan berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.userPekerja.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'hp' => $request->hp,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('user.teknisi.index')->with('success', 'Akun Pekerja Lapangan berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.teknisi.index')->with('success', 'Akun Pekerja Lapangan berhasil dihapus.');
    }
}
