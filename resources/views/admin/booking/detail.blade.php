<x-app-layout>
    {{-- @if (Auth::user()->role_id == '1' || Auth::user()->role_id == '2')
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-slate-800 leading-tight">
                {{ __('Detail Booking') }}
            </h2>
        </x-slot>
    @endif --}}

    <div class="bg-slate-50 min-h-screen py-12 font-sans selection:bg-cyan-200 selection:text-cyan-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 bg-white p-6 md:p-8 rounded-[1.5rem] shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-gray-100 mt-12">
                <div>
                    <h1 class="text-2xl md:text-3xl font-extrabold text-slate-900 flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>
                        Detail Booking #{{ $booking->booking_number }}
                    </h1>
                    <p class="text-slate-500 mt-1">Didaftarkan pada {{ $booking->created_at->format('d M Y, H:i') ?? $booking->booking_date->format('d M Y') }}</p>
                </div>

                <div>
                    @if ($booking->status == 'Menunggu')
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-slate-100 text-slate-600 border border-slate-200 shadow-sm"><span class="w-2 h-2 rounded-full bg-slate-500 mr-2"></span>{{ $booking->status }}</span>
                    @elseif ($booking->status == 'Ditolak')
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-red-50 text-red-600 border border-red-100 shadow-sm"><span class="w-2 h-2 rounded-full bg-red-500 mr-2"></span>{{ $booking->status }}</span>
                    @elseif ($booking->status == 'Diterima')
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-cyan-50 text-cyan-600 border border-cyan-100 shadow-sm"><span class="w-2 h-2 rounded-full bg-cyan-500 mr-2"></span>{{ $booking->status }}</span>
                    @elseif ($booking->status == 'Diproses')
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-blue-50 text-blue-600 border border-blue-100 shadow-sm"><span class="w-2 h-2 rounded-full bg-blue-500 mr-2 animate-pulse"></span>{{ $booking->status }}</span>
                    @elseif ($booking->status == 'Selesai')
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-yellow-50 text-yellow-600 border border-yellow-100 shadow-sm"><span class="w-2 h-2 rounded-full bg-yellow-500 mr-2"></span>{{ $booking->status }}</span>
                    @elseif ($booking->status == 'Dibayar')
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-green-50 text-green-600 border border-green-100 shadow-sm"><span class="w-2 h-2 rounded-full bg-green-500 mr-2"></span>{{ $booking->status }}</span>
                    @endif
                </div>
            </div>

            <div class="bg-white rounded-[1.5rem] shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-gray-100 overflow-hidden">
                <div class="bg-slate-50/50 px-6 py-4 border-b border-gray-100 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" /></svg>
                    <h3 class="text-lg font-bold text-slate-800">Informasi Layanan & Properti</h3>
                </div>
                <div class="p-6 md:p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6">

                        <div class="space-y-6">
                            <div>
                                <p class="text-sm font-bold text-slate-500 mb-1">Nama Pemesan</p>
                                <p class="text-base font-medium text-slate-800 bg-gray-50 px-4 py-3 rounded-xl border border-gray-100">{{ $booking->customer->name }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-500 mb-1">Kategori Layanan</p>
                                <p class="text-base font-medium text-slate-800 bg-gray-50 px-4 py-3 rounded-xl border border-gray-100">{{ $booking->category->name }}</p>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-500 mb-1">Tipe Properti</p>
                                <p class="text-base font-medium text-slate-800 bg-gray-50 px-4 py-3 rounded-xl border border-gray-100">{{ $booking->property_type }}</p>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div>
                                <p class="text-sm font-bold text-slate-500 mb-1">Tanggal Pengerjaan</p>
                                <p class="text-base font-medium text-slate-800 bg-gray-50 px-4 py-3 rounded-xl border border-gray-100 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                    {{ $booking->booking_date->format('d-m-Y') }}
                                </p>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-500 mb-1">Area / Luas Ruangan</p>
                                <p class="text-base font-medium text-slate-800 bg-gray-50 px-4 py-3 rounded-xl border border-gray-100">{{ $booking->room_area }}</p>
                            </div>
                        </div>

                        <div class="col-span-1 md:col-span-2 space-y-6 mt-2">
                            <div>
                                <p class="text-sm font-bold text-slate-500 mb-1">Detail Kondisi Ruangan</p>
                                <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 min-h-[5rem]">
                                    <p class="text-base text-slate-800 whitespace-pre-line">{{ $booking->room_condition }}</p>
                                </div>
                            </div>
                            @if($booking->notes)
                            <div>
                                <p class="text-sm font-bold text-slate-500 mb-1">Catatan Tambahan</p>
                                <div class="bg-yellow-50/50 p-4 rounded-xl border border-yellow-100 min-h-[4rem]">
                                    <p class="text-base text-slate-800 whitespace-pre-line">{{ $booking->notes }}</p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @if($booking->images->isNotEmpty())
            <div class="bg-white rounded-[1.5rem] shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-gray-100 overflow-hidden">
                <div class="bg-slate-50/50 px-6 py-4 border-b border-gray-100 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" /></svg>
                    <h3 class="text-lg font-bold text-slate-800">Foto Area Properti</h3>
                </div>
                <div class="p-6 md:p-8">
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($booking->images as $image)
                            <a href="{{ asset('images/' . $image->image) }}" target="_blank" class="block group relative overflow-hidden rounded-xl bg-gray-100 aspect-video border border-gray-200">
                                <img src="{{ asset('images/' . $image->image) }}" alt="Foto Area" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" /></svg>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            <div class="bg-white rounded-[1.5rem] shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-gray-100 overflow-hidden relative">
                <div class="bg-slate-50/50 px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                        <h3 class="text-lg font-bold text-slate-800">Laporan Pengerjaan</h3>
                    </div>
                </div>

                <div class="p-6 md:p-8">
                    @if($booking->cleaningReport)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-6">

                            <div class="space-y-6">
                                <div>
                                    <p class="text-sm font-bold text-slate-500 mb-1">Nama Petugas Cleaner</p>
                                    <p class="text-base font-bold text-slate-800 flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-full bg-cyan-100 text-cyan-600 items-center justify-center inline-flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
                                        </div>
                                        {{ $booking->cleaningReport->cleaner->name }}
                                    </p>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-sm font-bold text-slate-500 mb-1">Tanggal Pengerjaan</p>
                                        <p class="text-base font-medium text-slate-800 bg-gray-50 px-4 py-2 rounded-lg border border-gray-100">{{ $booking->cleaningReport->process_date->format('d-m-Y') }}</p>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-500 mb-1">Tanggal Selesai</p>
                                        <p class="text-base font-medium {{ $booking->cleaningReport->completion_date ? 'text-green-600' : 'text-orange-500' }} bg-gray-50 px-4 py-2 rounded-lg border border-gray-100">
                                            {{ $booking->cleaningReport->completion_date ? $booking->cleaningReport->completion_date->format('d-m-Y') : 'Dalam Proses' }}
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-slate-500 mb-1">Estimasi Waktu Pengerjaan</p>
                                    <p class="text-base font-medium text-slate-800 bg-gray-50 px-4 py-2 rounded-lg border border-gray-100">{{ $booking->cleaningReport->time_estimate }}</p>
                                </div>
                            </div>

                            <div class="bg-cyan-50 rounded-2xl p-6 border border-cyan-100">
                                <h4 class="font-bold text-slate-800 mb-4 border-b border-cyan-200 pb-2">Rincian Biaya Layanan</h4>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center">
                                        <p class="text-sm text-slate-600">Biaya Jasa Kebersihan</p>
                                        <p class="font-medium text-slate-800">Rp {{ number_format($booking->cleaningReport->service_cost, 0, ',', '.') }}</p>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <p class="text-sm text-slate-600">Biaya Tambahan (Cairan/Alat Khusus)</p>
                                        <p class="font-medium text-slate-800">Rp {{ number_format($booking->cleaningReport->additional_cost, 0, ',', '.') }}</p>
                                    </div>
                                    <div class="pt-3 border-t border-cyan-200 flex justify-between items-center mt-2">
                                        <p class="text-base font-bold text-slate-800">Total Biaya</p>
                                        <p class="text-xl font-extrabold text-cyan-600">Rp {{ number_format($booking->cleaningReport->total_cost, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-1 md:col-span-2 space-y-6 mt-2 border-t border-gray-100 pt-6">
                                <div>
                                    <p class="text-sm font-bold text-slate-500 mb-1">Kondisi Awal / Analisa Petugas</p>
                                    <div class="bg-gray-50 p-4 rounded-xl border border-gray-100">
                                        <p class="text-base text-slate-800 whitespace-pre-line">{{ $booking->cleaningReport->initial_condition }}</p>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-slate-500 mb-1">Tindakan Pembersihan yang Dilakukan</p>
                                    <div class="bg-green-50/50 p-4 rounded-xl border border-green-100">
                                        <p class="text-base text-slate-800 whitespace-pre-line">{{ $booking->cleaningReport->cleaning_action }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @else
                        <div class="text-center py-8">
                            <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            </div>
                            <p class="text-slate-500 font-medium">Layanan belum diproses oleh tim kami. Laporan akan muncul setelah petugas ditugaskan.</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                <div class="bg-white rounded-[1.5rem] shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-gray-100 overflow-hidden h-full">
                    <div class="bg-slate-50/50 px-6 py-4 border-b border-gray-100 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" /></svg>
                        <h3 class="text-lg font-bold text-slate-800">Detail Pembayaran</h3>
                    </div>
                    <div class="p-6 md:p-8">
                        @if($booking->payment)
                            <div class="space-y-4">
                                <div class="flex items-center gap-4 bg-green-50 p-4 rounded-xl border border-green-100 mb-6">
                                    <div class="w-12 h-12 bg-green-500 text-white rounded-full flex items-center justify-center shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                    </div>
                                    <div>
                                        <p class="font-bold text-green-800 text-lg">Pembayaran Lunas</p>
                                        <p class="text-sm text-green-600">Telah dibayar pada {{ $booking->payment->payment_date->format('d-m-Y') }}</p>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                    <p class="text-sm font-bold text-slate-500">Metode Pembayaran</p>
                                    <p class="font-medium text-slate-800">{{ $booking->payment->paymentType->name }}</p>
                                </div>
                                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                    <p class="text-sm font-bold text-slate-500">Jumlah Dibayar</p>
                                    <p class="font-bold text-slate-800">Rp {{ number_format($booking->payment->amount, 0, ',', '.') }}</p>
                                </div>
                                <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                    <p class="text-sm font-bold text-slate-500">Kembalian</p>
                                    <p class="font-medium text-slate-800">Rp {{ number_format($booking->payment->change_amount, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-6">
                                <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                </div>
                                <p class="text-slate-500 font-medium">Belum ada data pembayaran untuk layanan ini.</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="bg-white rounded-[1.5rem] shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-gray-100 overflow-hidden h-full flex flex-col">
                    <div class="bg-slate-50/50 px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                            <h3 class="text-lg font-bold text-slate-800">Ulasan Anda</h3>
                        </div>
                        @if($booking->testimonial && Auth::user()->role_id == '3' && $booking->status == 'Dibayar')
                            <a href="{{ route('testimonial.edit', ['id' => $booking->testimonial->id, 'booking_id' => $booking->id]) }}" class="text-sm font-bold text-cyan-600 hover:text-cyan-700 bg-cyan-50 hover:bg-cyan-100 px-3 py-1.5 rounded-lg transition-colors">Edit Ulasan</a>
                        @endif
                    </div>

                    <div class="p-6 md:p-8 flex-grow flex flex-col justify-center">
                        @if($booking->testimonial)
                            <div class="text-center mb-6">
                                <div class="flex justify-center text-yellow-400 text-2xl mb-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $booking->testimonial->rating)
                                            <span>&#9733;</span>
                                        @else
                                            <span class="text-gray-200">&#9733;</span>
                                        @endif
                                    @endfor
                                </div>
                                <p class="text-xs text-slate-400">Ditulis pada {{ $booking->testimonial->testimoni_date->format('d-m-Y') }}</p>
                            </div>
                            <div class="bg-gray-50 rounded-xl p-6 relative">
                                <svg class="w-8 h-8 text-gray-300 absolute -top-3 -left-3 transform -scale-x-100" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" /></svg>
                                <p class="text-slate-600 italic text-center relative z-10">"{{ $booking->testimonial->description }}"</p>
                            </div>
                        @else
                            <div class="text-center py-4">
                                <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                </div>
                                <p class="text-slate-500 font-medium mb-4">Anda belum memberikan ulasan untuk layanan ini.</p>

                                @if (Auth::user()->role_id == '3' && $booking->status == 'Dibayar')
                                    <a href="{{ route('testimonial.create', $booking->id) }}" class="inline-flex items-center gap-2 py-2.5 px-6 bg-cyan-500 text-white font-bold rounded-xl hover:bg-cyan-600 transition-all duration-300 shadow-md shadow-cyan-500/30">
                                        Beri Ulasan Sekarang
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
