<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-cyan-100 text-cyan-600 rounded-xl flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" /></svg>
            </div>
            <h2 class="font-extrabold text-2xl text-slate-800 leading-tight">
                {{ __('Daftar Tugas Layanan') }}
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
        table.dataTable { width: 100% !important; min-width: 1200px; }
    </style>

    <div class="bg-slate-50 min-h-screen py-10 font-sans selection:bg-cyan-200 selection:text-cyan-900">
        <div class="max-w-[95rem] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 overflow-hidden">
                <div class="p-6 md:p-8">

                    <div class="mb-8">
                        <h3 class="text-lg font-bold text-slate-800">Manajemen Tugas Lapangan</h3>
                        <p class="text-sm text-slate-500">Terima dan proses permintaan layanan kebersihan yang telah disetujui untuk Anda.</p>
                    </div>

                    <div class="bg-slate-50/50 p-5 rounded-2xl border border-gray-100 mb-8 flex flex-col md:flex-row items-end md:items-center gap-4">
                        <div class="flex items-center gap-3 w-full md:w-auto">
                            <div class="w-full">
                                <label for="start_date" class="block text-xs font-bold text-slate-500 mb-1 uppercase tracking-wider">Tanggal Mulai</label>
                                <input type="date" id="start_date" name="start_date" class="block w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-700 font-medium">
                            </div>
                            <span class="mt-6 text-slate-400">-</span>
                            <div class="w-full">
                                <label for="end_date" class="block text-xs font-bold text-slate-500 mb-1 uppercase tracking-wider">Tanggal Selesai</label>
                                <input type="date" id="end_date" name="end_date" class="block w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-700 font-medium">
                            </div>
                        </div>
                        <button id="filter_button" class="w-full md:w-auto px-8 py-2.5 bg-cyan-500 text-white font-bold rounded-xl hover:bg-cyan-600 hover:shadow-lg hover:shadow-cyan-500/30 transition-all duration-300 md:mt-5 lg:mt-5">
                            Terapkan Filter
                        </button>
                    </div>

                    <div>
                        <table id="example" class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wider border-b border-gray-100">
                                    <th class="px-4 py-4 font-bold rounded-tl-xl text-center" data-priority="1">No. Tugas</th>
                                    <th class="px-4 py-4 font-bold" data-priority="2">Pelanggan</th>
                                    <th class="px-4 py-4 font-bold" data-priority="3">Layanan</th>
                                    <th class="px-4 py-4 font-bold" data-priority="4">Tipe Properti</th>
                                    <th class="px-4 py-4 font-bold" data-priority="5">Area / Ruangan</th>
                                    <th class="px-4 py-4 font-bold" data-priority="6">Detail Kondisi</th>
                                    <th class="px-4 py-4 font-bold text-center" data-priority="7">Tgl. Jadwal</th>
                                    <th class="px-4 py-4 font-bold text-center" data-priority="8">Status</th>
                                    <th class="px-4 py-4 font-bold text-center rounded-tr-xl" data-priority="9">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-slate-700 text-sm">
                                @foreach ($bookings as $booking)
                                <tr class="border-b border-gray-50 hover:bg-slate-50/50 transition-colors duration-200 align-middle">
                                    <td class="px-4 py-4 text-center font-mono font-bold text-slate-600">#{{ $booking->booking_number }}</td>
                                    <td class="px-4 py-4 font-bold text-slate-800 whitespace-nowrap">{{ $booking->customer->name }}</td>
                                    <td class="px-4 py-4 font-semibold text-cyan-600 whitespace-nowrap">{{ $booking->category->name }}</td>
                                    <td class="px-4 py-4 text-slate-600">{{ $booking->property_type }}</td>
                                    <td class="px-4 py-4 text-slate-600">{{ $booking->room_area }}</td>
                                    <td class="px-4 py-4 text-slate-600 leading-snug min-w-[150px] truncate max-w-[200px]" title="{{ $booking->room_condition }}">{{ $booking->room_condition }}</td>
                                    <td class="px-4 py-4 text-center font-medium">{{ $booking->booking_date->format('d-m-Y') }}</td>

                                    <td class="px-4 py-4 text-center">
                                        @if ($booking->status == 'Menunggu')
                                            <span class="inline-flex items-center justify-center px-3 py-1 rounded-full text-[11px] font-bold bg-slate-100 text-slate-600 whitespace-nowrap"><span class="w-1.5 h-1.5 rounded-full bg-slate-500 mr-1.5"></span>{{ $booking->status }}</span>
                                        @elseif ($booking->status == 'Ditolak')
                                            <span class="inline-flex items-center justify-center px-3 py-1 rounded-full text-[11px] font-bold bg-red-50 text-red-600 whitespace-nowrap"><span class="w-1.5 h-1.5 rounded-full bg-red-500 mr-1.5"></span>{{ $booking->status }}</span>
                                        @elseif ($booking->status == 'Diterima')
                                            <span class="inline-flex items-center justify-center px-3 py-1 rounded-full text-[11px] font-bold bg-cyan-50 text-cyan-600 whitespace-nowrap"><span class="w-1.5 h-1.5 rounded-full bg-cyan-500 mr-1.5"></span>{{ $booking->status }}</span>
                                        @elseif ($booking->status == 'Diproses')
                                            <span class="inline-flex items-center justify-center px-3 py-1 rounded-full text-[11px] font-bold bg-blue-50 text-blue-600 whitespace-nowrap"><span class="w-1.5 h-1.5 rounded-full bg-blue-500 mr-1.5 animate-pulse"></span>{{ $booking->status }}</span>
                                        @elseif ($booking->status == 'Selesai')
                                            <span class="inline-flex items-center justify-center px-3 py-1 rounded-full text-[11px] font-bold bg-yellow-50 text-yellow-600 whitespace-nowrap"><span class="w-1.5 h-1.5 rounded-full bg-yellow-500 mr-1.5"></span>{{ $booking->status }}</span>
                                        @elseif ($booking->status == 'Dibayar')
                                            <span class="inline-flex items-center justify-center px-3 py-1 rounded-full text-[11px] font-bold bg-green-50 text-green-600 whitespace-nowrap"><span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></span>{{ $booking->status }}</span>
                                        @endif
                                    </td>

                                    <td class="px-4 py-4">
                                        <div class="flex justify-center items-center gap-1.5">
                                            @if ($booking->status == 'Diterima')
                                                <a href="{{ route('report.create', $booking->id) }}" class="w-8 h-8 rounded-lg bg-yellow-50 text-yellow-600 hover:bg-yellow-500 hover:text-white flex items-center justify-center transition-colors tooltip" title="Mulai Proses Pekerjaan">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" /></svg>
                                                </a>
                                                <a href="{{ route('teknisi.booking.show', $booking->id) }}" class="w-8 h-8 rounded-lg bg-cyan-50 text-cyan-600 hover:bg-cyan-500 hover:text-white flex items-center justify-center transition-colors tooltip" title="Detail Tugas">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                                </a>

                                            @elseif ($booking->status == 'Diproses')
                                                <button onclick="confirmFinish({{ $booking->id }})" class="w-8 h-8 rounded-lg bg-green-50 text-green-600 hover:bg-green-500 hover:text-white flex items-center justify-center transition-colors tooltip" title="Tandai Selesai">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                                </button>
                                                <form id="finish-form-{{ $booking->id }}" action="{{ route('booking.selesai', $booking->id) }}" method="POST" style="display: none;">@csrf @method('PUT')</form>

                                                <a href="{{ route('report.edit', ['id' => $booking->cleaningReport->id, 'booking_id' => $booking->id] ) }}" class="w-8 h-8 rounded-lg bg-orange-50 text-orange-500 hover:bg-orange-500 hover:text-white flex items-center justify-center transition-colors tooltip" title="Edit Laporan Pengerjaan">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                                                </a>

                                                <a href="{{ route('teknisi.booking.show', $booking->id) }}" class="w-8 h-8 rounded-lg bg-cyan-50 text-cyan-600 hover:bg-cyan-500 hover:text-white flex items-center justify-center transition-colors tooltip" title="Detail Tugas">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                                </a>

                                            @else
                                                <a href="{{ route('teknisi.booking.show', $booking->id) }}" class="w-8 h-8 rounded-lg bg-cyan-50 text-cyan-600 hover:bg-cyan-500 hover:text-white flex items-center justify-center transition-colors tooltip" title="Detail Tugas">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                                </a>
                                            @endif
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
