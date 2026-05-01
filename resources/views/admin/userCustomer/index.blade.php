<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-cyan-100 text-cyan-600 rounded-xl flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
            </div>
            <h2 class="font-extrabold text-2xl text-slate-800 leading-tight">
                {{ __('Kelola Data Pelanggan') }}
            </h2>
        </div>
    </x-slot>

    <style>
        .dataTables_wrapper .dataTables_filter input { border: 1px solid #e2e8f0; border-radius: 0.75rem; padding: 0.5rem 1rem; outline: none; margin-left: 0.5rem; background-color: #f8fafc; }
        .dataTables_wrapper .dataTables_filter input:focus { border-color: #06b6d4; box-shadow: 0 0 0 2px rgba(6, 182, 212, 0.2); background-color: #fff; }
        .dataTables_wrapper .dataTables_length select { border: 1px solid #e2e8f0; border-radius: 0.5rem; padding: 0.25rem 2rem 0.25rem 0.5rem; background-color: #f8fafc; }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current { background: #06b6d4 !important; color: white !important; border: none !important; border-radius: 0.5rem; box-shadow: 0 4px 6px -1px rgba(6, 182, 212, 0.2); }
        .dataTables_wrapper .dataTables_paginate .paginate_button { border-radius: 0.5rem !important; border: transparent !important; }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover { background: #f1f5f9 !important; color: #0f172a !important; border: transparent !important; }
        table.dataTable.no-footer { border-bottom: 1px solid #f1f5f9 !important; }
        .dataTables_wrapper { overflow-x: auto; width: 100%; }
    </style>

    <div class="bg-slate-50 min-h-screen py-10 font-sans selection:bg-cyan-200 selection:text-cyan-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 overflow-hidden">
                <div class="p-6 md:p-8">
                    
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                        <div>
                            <h3 class="text-lg font-bold text-slate-800">Daftar Akun Pelanggan (Customer)</h3>
                            <p class="text-sm text-slate-500">Kelola data pelanggan yang terdaftar di dalam sistem layanan HOMIOKLIN.</p>
                        </div>
                        <a href="{{ route('user.customer.create') }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-cyan-500 text-white font-bold rounded-xl hover:bg-cyan-600 hover:shadow-lg hover:shadow-cyan-500/30 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" /></svg>
                            Tambah Pelanggan
                        </a>
                    </div>

                    <div>
                        <table id="example" class="w-full text-left border-collapse" style="width:100%;">
                            <thead>
                                <tr class="bg-slate-50 text-slate-500 text-sm uppercase tracking-wider border-b border-gray-100">
                                    <th class="px-6 py-4 font-bold rounded-tl-xl w-1/4" data-priority="1">Profil Pelanggan</th>
                                    <th class="px-6 py-4 font-bold" data-priority="2">Kontak Email</th>
                                    <th class="px-6 py-4 font-bold" data-priority="3">No. Handphone</th>
                                    <th class="px-6 py-4 font-bold" data-priority="4">Alamat Domisili</th>
                                    <th class="px-6 py-4 font-bold text-center rounded-tr-xl w-32" data-priority="5">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-slate-700 text-sm">
                                @foreach ($customers as $customer)
                                <tr class="border-b border-gray-50 hover:bg-slate-50/50 transition-colors duration-200">
                                    <td class="px-6 py-4 font-bold text-slate-800 flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-cyan-100 text-cyan-600 flex items-center justify-center text-lg shadow-sm flex-shrink-0">
                                            {{ substr($customer->name, 0, 1) }}
                                        </div>
                                        {{ $customer->name }}
                                    </td>
                                    <td class="px-6 py-4 text-slate-600 font-medium">{{ $customer->email }}</td>
                                    <td class="px-6 py-4 text-slate-600">{{ $customer->hp }}</td>
                                    <td class="px-6 py-4 text-slate-500 min-w-[150px] truncate max-w-[200px]" title="{{ $customer->alamat }}">{{ $customer->alamat }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center items-center gap-2">
                                            <a href="{{ route('user.customer.edit', $customer->id) }}" class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-orange-50 text-orange-500 hover:bg-orange-500 hover:text-white transition-colors duration-200 tooltip" title="Edit Data">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                                            </a>
                                            <button onclick="confirmDelete({{ $customer->id }})" class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-colors duration-200 tooltip" title="Hapus Data">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                            </button>
                                            <form id="delete-form-{{ $customer->id }}" action="{{ route('user.customer.destroy', $customer->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>