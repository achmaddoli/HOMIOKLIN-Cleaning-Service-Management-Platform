<x-user>
    <div class="bg-slate-50 min-h-screen pt-24 pb-20 font-sans selection:bg-cyan-200 selection:text-cyan-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex items-center justify-between mb-10 border-b border-gray-200 pb-6">
                <div>
                    <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Riwayat Booking</h2>
                    <p class="text-slate-500 mt-2">Daftar permintaan layanan kebersihan Anda.</p>
                </div>
                <a href="{{ route('bookings.create') }}" class="hidden sm:inline-flex items-center gap-2 py-2.5 px-5 bg-cyan-500 text-white font-semibold rounded-xl hover:bg-cyan-600 transition-all duration-300 shadow-md shadow-cyan-500/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" /></svg>
                    Booking Baru
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($bookings as $booking)
                    <div class="bg-white rounded-[1.5rem] p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 relative flex flex-col group">
                        
                        <div class="flex justify-between items-start mb-6">
                            <div class="bg-gray-50 px-3 py-1.5 rounded-lg border border-gray-100">
                                <p class="font-mono text-sm font-bold text-slate-700">#{{ $booking->booking_number }}</p>
                            </div>
                            
                            <div>
                                @if ($booking->status == 'Menunggu')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-600 border border-slate-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-500 mr-2"></span>{{ $booking->status }}
                                    </span>
                                @elseif ($booking->status == 'Ditolak')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-50 text-red-600 border border-red-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500 mr-2"></span>{{ $booking->status }}
                                    </span>
                                @elseif ($booking->status == 'Diterima')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-cyan-50 text-cyan-600 border border-cyan-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-cyan-500 mr-2"></span>{{ $booking->status }}
                                    </span>
                                @elseif ($booking->status == 'Diproses')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-600 border border-blue-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500 mr-2 animate-pulse"></span>{{ $booking->status }}
                                    </span>
                                @elseif ($booking->status == 'Selesai')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-yellow-50 text-yellow-600 border border-yellow-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 mr-2"></span>{{ $booking->status }}
                                    </span>
                                @elseif ($booking->status == 'Dibayar')
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-50 text-green-600 border border-green-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-2"></span>{{ $booking->status }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="flex-grow space-y-4">
                            <div class="flex items-center gap-3 text-slate-600">
                                <div class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-slate-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-400 font-medium">Tanggal Layanan</p>
                                    <p class="font-bold text-slate-800">{{ $booking->booking_date->format('d-m-Y') }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center gap-3 text-slate-600">
                                <div class="w-8 h-8 rounded-full bg-cyan-50 flex items-center justify-center text-cyan-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-400 font-medium">Jenis Layanan</p>
                                    <p class="font-bold text-slate-800 line-clamp-1">{{ $booking->category->name }}</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 text-slate-600">
                                <div class="w-8 h-8 rounded-full bg-yellow-50 flex items-center justify-center text-yellow-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2" /></svg>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-400 font-medium">Detail Properti</p>
                                    <p class="font-bold text-slate-800 line-clamp-1">{{ $booking->laptop_brand }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-8 pt-4 border-t border-gray-100">
                            <a href="{{ route('user.booking.show', $booking->id) }}" class="block w-full py-3 px-4 bg-cyan-50 text-cyan-600 text-center font-bold rounded-xl hover:bg-cyan-500 hover:text-white transition-colors duration-300">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 bg-white rounded-[2.5rem] p-16 text-center border border-gray-100 shadow-sm mt-4">
                        <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" /></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-800 mb-2">Belum Ada Riwayat</h3>
                        <p class="text-slate-500 mb-8 max-w-md mx-auto">Anda belum pernah melakukan booking layanan. Jadwalkan layanan kebersihan pertama Anda sekarang.</p>
                        <a href="{{ route('bookings.create') }}" class="inline-flex items-center gap-2 py-3.5 px-8 bg-cyan-500 text-white font-bold rounded-xl hover:bg-cyan-600 transition-all duration-300 shadow-lg shadow-cyan-500/30">
                            Buat Booking Baru
                        </a>
                    </div>
                @endforelse
            </div>

            <div class="fixed bottom-8 right-8 sm:hidden z-40">
                <a href="{{ route('bookings.create') }}" class="w-14 h-14 bg-cyan-500 text-white rounded-full flex items-center justify-center shadow-xl shadow-cyan-500/40">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                </a>
            </div>

        </div>
    </div>
</x-user>