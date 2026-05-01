<x-user>
    <div class="bg-slate-50 min-h-screen pt-24 pb-20 font-sans selection:bg-cyan-200 selection:text-cyan-900">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="inline-flex items-center mt-5 gap-2 px-4 py-2 rounded-full bg-cyan-50 text-cyan-600 text-sm font-bold mb-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Solusi Kebersihan Anda
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight mb-4">Layanan <span class="text-cyan-500">HOMIOKLIN</span></h1>
                <p class="text-slate-500 max-w-2xl mx-auto text-lg">Pilih layanan kebersihan yang paling sesuai dengan kebutuhan properti Anda. Kami berikan hasil maksimal dengan harga transparan.</p>
            </div>

            @if ($services && $services->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($services as $service)
                    <div class="bg-white rounded-3xl p-8 border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-2xl hover:shadow-cyan-100 hover:-translate-y-2 transition-all duration-300 relative flex flex-col group">
                        
                        <div class="w-14 h-14 bg-cyan-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-cyan-500 transition-colors duration-300">
                            <svg class="w-7 h-7 text-cyan-500 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2"></path></svg>
                        </div>

                        <div class="flex-grow">
                            <h3 class="text-2xl font-bold text-slate-800 mb-3">{{ $service->name }}</h3>
                            <p class="text-slate-500 text-sm leading-relaxed mb-6">{{ $service->description }}</p>
                        </div>
                        
                        <div class="pt-6 border-t border-gray-100 mt-auto">
                            <div class="flex items-end gap-2 mb-2">
                                <span class="text-3xl font-extrabold text-cyan-600">Rp{{ number_format($service->price, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex items-center text-sm font-medium text-slate-500 mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                Estimasi Pengerjaan: {{ $service->time_estimate }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-[2.5rem] p-16 text-center border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] max-w-2xl mx-auto">
                    <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-2">Belum Ada Layanan</h3>
                    <p class="text-slate-500">Maaf, saat ini daftar layanan kebersihan belum tersedia. Silakan cek kembali nanti atau hubungi customer service kami.</p>
                </div>
            @endif

        </div>
    </div>
</x-user>