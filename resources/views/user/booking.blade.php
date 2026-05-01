<x-user>
    <div class="bg-slate-50 min-h-screen pt-24 pb-20 font-sans selection:bg-cyan-200 selection:text-cyan-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-12 mt-5">
                <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight mb-4">Jadwalkan <span class="text-cyan-500">Layanan</span></h1>
                <p class="text-slate-500 max-w-2xl mx-auto text-lg">Lengkapi detail di bawah ini untuk memesan layanan kebersihan. Tim kami akan segera merespons permintaan Anda.</p>
            </div>

            <div class="flex flex-col lg:flex-row gap-10 lg:items-start">

                <div class="lg:w-1/3 bg-cyan-600 rounded-[2rem] p-10 text-white shadow-xl shadow-cyan-500/20 top-28 hidden lg:block overflow-hidden relative">
                    <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>
                    <div class="absolute -left-10 -bottom-10 w-40 h-40 bg-cyan-900/20 rounded-full blur-2xl"></div>

                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-white/20 backdrop-blur rounded-2xl flex items-center justify-center mb-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 leading-tight">Garansi 100% Kepuasan</h3>
                        <p class="text-cyan-100 mb-8 leading-relaxed">Kami memastikan setiap sudut ruangan Anda bersih maksimal. Jika kurang puas, beri tahu kami!</p>

                        <div class="space-y-6">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center font-bold">1</div>
                                <p class="text-sm font-medium">Isi detail form properti</p>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center font-bold">2</div>
                                <p class="text-sm font-medium">Tentukan jadwal pengerjaan</p>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center font-bold">3</div>
                                <p class="text-sm font-medium">Tim kami meluncur ke lokasi</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-2/3 bg-white rounded-[2rem] p-8 md:p-12 shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100">
                    <form action="{{ route('bookings.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf

                        <div>
                            <h4 class="text-lg font-bold text-slate-800 mb-6 flex items-center gap-2 border-b border-gray-100 pb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" /></svg>
                                Detail Layanan & Properti
                            </h4>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="col-span-1 md:col-span-2">
                                    <label for="category_id" class="block text-sm font-bold text-slate-700 mb-2">Pilih Layanan</label>
                                    <select name="category_id" id="category_id" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-700" required>
                                        <option value="">-- Pilih Layanan Kebersihan --</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="property_type" class="block text-sm font-bold text-slate-700 mb-2">Tipe Properti</label>
                                    <input type="text" name="property_type" id="property_type" placeholder="Cth: Rumah / Apartemen / Kos / Sofa" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-700" required>
                                </div>

                                <div>
                                    <label for="room_area" class="block text-sm font-bold text-slate-700 mb-2">Area / Luas Ruangan / Ukuran</label>
                                    <input type="text" name="room_area" id="room_area" placeholder="Cth: 3 Kamar / Luas 45m2 / Sedang" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-700" required>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-lg font-bold text-slate-800 mb-6 flex items-center gap-2 border-b border-gray-100 pb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" /></svg>
                                Jadwal & Informasi Tambahan
                            </h4>

                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <label for="booking_date" class="block text-sm font-bold text-slate-700 mb-2">Tanggal Pengerjaan</label>
                                    <input type="date" name="booking_date" id="booking_date" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-700" required>
                                </div>

                                <div>
                                    <label for="room_condition" class="block text-sm font-bold text-slate-700 mb-2">Detail Kondisi Ruangan / Furniture</label>
                                    <textarea name="room_condition" id="room_condition" placeholder="Ceritakan detail kondisi yang perlu dibersihkan..." class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors resize-y text-slate-700" rows="3" required></textarea>
                                </div>

                                <div>
                                    <label for="notes" class="block text-sm font-bold text-slate-700 mb-2">Catatan Akses (Opsional)</label>
                                    <textarea name="notes" id="notes" placeholder="Cth: Kunci dititipkan di satpam, ada hewan peliharaan, dll." class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors resize-y text-slate-700" rows="2"></textarea>
                                </div>

                                <div>
                                    <label for="images" class="block text-sm font-bold text-slate-700 mb-2">Unggah Foto Area (Opsional)</label>
                                    <input type="file" name="images[]" id="images" class="block w-full text-sm text-slate-500 file:mr-4 file:py-3.5 file:px-6 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-cyan-50 file:text-cyan-700 hover:file:bg-cyan-100 transition-all cursor-pointer border border-gray-200 rounded-xl bg-gray-50 focus:outline-none" multiple>
                                </div>
                            </div>
                        </div>

                        <div class="pt-4 mt-6">
                            <button type="submit" class="w-full md:w-auto inline-flex justify-center items-center gap-2 py-4 px-10 bg-cyan-500 text-white font-bold rounded-xl hover:bg-cyan-600 hover:shadow-lg hover:shadow-cyan-500/30 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                                Konfirmasi Booking
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-user>
