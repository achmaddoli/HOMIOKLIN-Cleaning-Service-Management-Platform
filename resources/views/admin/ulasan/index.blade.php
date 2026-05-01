<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-cyan-100 text-cyan-600 rounded-xl flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" /></svg>
            </div>
            <h2 class="font-extrabold text-2xl text-slate-800 leading-tight">
                {{ __('Ulasan & Testimoni') }}
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
    </style>

    <div class="bg-slate-50 min-h-screen py-10 font-sans selection:bg-cyan-200 selection:text-cyan-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 overflow-hidden">
                <div class="p-6 md:p-8">
                    
                    <div class="mb-8">
                        <h3 class="text-lg font-bold text-slate-800">Daftar Penilaian Pelanggan</h3>
                        <p class="text-sm text-slate-500">Kumpulan ulasan, rating, dan testimoni terkait layanan kebersihan yang telah diselesaikan.</p>
                    </div>

                    <div class="overflow-x-auto">
                        <table id="example" class="w-full text-left border-collapse" style="width:100%;">
                            <thead>
                                <tr class="bg-slate-50 text-slate-500 text-sm uppercase tracking-wider border-b border-gray-100">
                                    <th class="px-6 py-4 font-bold rounded-tl-xl w-32" data-priority="1">No. Booking</th>
                                    <th class="px-6 py-4 font-bold text-center w-36" data-priority="2">Tgl Testimoni</th>
                                    <th class="px-6 py-4 font-bold text-center w-36" data-priority="3">Rating</th>
                                    <th class="px-6 py-4 font-bold" data-priority="4">Deskripsi Ulasan</th>
                                    <th class="px-6 py-4 font-bold text-center rounded-tr-xl w-32" data-priority="5">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-slate-700 text-sm">
                                @foreach ($testimonials as $testimonial)
                                <tr class="border-b border-gray-50 hover:bg-slate-50/50 transition-colors duration-200">
                                    <td class="px-6 py-4 font-mono font-bold text-slate-600">#{{ $testimonial->booking->booking_number }}</td>
                                    <td class="px-6 py-4 text-center font-medium text-slate-500">{{ $testimonial->testimoni_date->format('d-m-Y') }}</td>
                                    
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center items-center text-lg gap-0.5">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $testimonial->rating)
                                                    <span class="text-yellow-400 drop-shadow-sm">&#9733;</span> @else
                                                    <span class="text-slate-200">&#9733;</span> @endif
                                            @endfor
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 text-slate-600 italic">"{{ $testimonial->description }}"</td>
                                    
                                    <td class="px-6 py-4">
                                        <div class="flex justify-center items-center gap-2">
                                            <a href="{{ route('admin.testimonial.edit', $testimonial->id) }}" class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-orange-50 text-orange-500 hover:bg-orange-500 hover:text-white transition-colors duration-200 tooltip" title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                                            </a>
                                            
                                            <button onclick="confirmDelete({{ $testimonial->id }})" class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-red-50 text-red-500 hover:bg-red-500 hover:text-white transition-colors duration-200 tooltip" title="Hapus">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                            </button>
                                            
                                            <form id="delete-form-{{ $testimonial->id }}" action="{{ route('admin.testimonial.destroy', $testimonial->id) }}" method="POST" style="display: none;">
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