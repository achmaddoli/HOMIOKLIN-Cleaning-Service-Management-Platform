<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-cyan-100 text-cyan-600 rounded-xl flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
            </div>
            <h2 class="font-extrabold text-2xl text-slate-800 leading-tight">
                {{ __('Tambah Layanan Baru') }}
            </h2>
        </div>
    </x-slot>

    <div class="bg-slate-50 min-h-screen py-10 font-sans selection:bg-cyan-200 selection:text-cyan-900">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 overflow-hidden">
                <div class="p-8 md:p-12">
                    
                    <div class="mb-8 border-b border-gray-100 pb-6">
                        <h3 class="text-xl font-bold text-slate-800">Detail Varian Layanan</h3>
                        <p class="text-slate-500 mt-1">Lengkapi informasi varian layanan, estimasi waktu pengerjaan, dan harga.</p>
                    </div>

                    <form action="{{ route('admin.list.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            
                            <div class="space-y-6">
                                <div>
                                    <label for="category_id" class="block text-sm font-bold text-slate-700 mb-2">Kategori Induk</label>
                                    <select name="category_id" id="category_id" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-800 cursor-pointer" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="name" class="block text-sm font-bold text-slate-700 mb-2">Nama Layanan</label>
                                    <input type="text" name="name" id="name" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-800" placeholder="Contoh: Cuci Sofa 2 Dudukan" required>
                                </div>

                                <div>
                                    <label for="description" class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Lengkap</label>
                                    <textarea name="description" id="description" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors resize-y text-slate-800" rows="5" placeholder="Jelaskan detail apa saja yang dicakup layanan ini..."></textarea>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <div>
                                    <label for="time_estimate" class="block text-sm font-bold text-slate-700 mb-2">Estimasi Waktu Pengerjaan</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                        </div>
                                        <input type="text" name="time_estimate" id="time_estimate" class="block w-full pl-12 pr-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-800" placeholder="Contoh: 1 - 2 Jam" required>
                                    </div>
                                </div>

                                <div>
                                    <label for="price" class="block text-sm font-bold text-slate-700 mb-2">Estimasi Harga (Rp)</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none font-bold text-gray-400">
                                            Rp
                                        </div>
                                        <input type="number" name="price" id="price" class="block w-full pl-12 pr-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-800" placeholder="150000" required>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="flex flex-col-reverse sm:flex-row items-center justify-end gap-4 pt-8 mt-4 border-t border-gray-100">
                            <a href="{{ route('admin.list.index') }}" class="w-full sm:w-auto px-6 py-3.5 bg-white border border-gray-200 text-slate-600 font-bold rounded-xl hover:bg-gray-50 hover:text-slate-800 transition-colors text-center">
                                Batal & Kembali
                            </a>
                            <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-cyan-500 text-white font-bold rounded-xl hover:bg-cyan-600 hover:shadow-lg hover:shadow-cyan-500/30 transition-all duration-300">
                                Simpan Layanan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>