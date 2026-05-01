<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-cyan-100 text-cyan-600 rounded-xl flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" /></svg>
            </div>
            <h2 class="font-extrabold text-2xl text-slate-800 leading-tight">
                {{ __('Tambah Pelanggan Baru') }}
            </h2>
        </div>
    </x-slot>

    <div class="bg-slate-50 min-h-screen py-10 font-sans selection:bg-cyan-200 selection:text-cyan-900">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 overflow-hidden">
                <div class="p-8 md:p-12">
                    
                    <div class="mb-8 border-b border-gray-100 pb-6">
                        <h3 class="text-xl font-bold text-slate-800">Detail Data Pelanggan</h3>
                        <p class="text-slate-500 mt-1">Lengkapi formulir di bawah ini untuk menambahkan akun pelanggan (customer) baru ke dalam sistem.</p>
                    </div>

                    <form action="{{ route('user.customer.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            
                            <div class="space-y-6">
                                <div>
                                    <label for="name" class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap</label>
                                    <input type="text" name="name" id="name" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-800" placeholder="Contoh: Budi Santoso" value="{{ old('name') }}" required>
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-bold text-slate-700 mb-2">Alamat Email</label>
                                    <input type="email" name="email" id="email" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-800" placeholder="pelanggan@email.com" value="{{ old('email') }}" required>
                                </div>
                                <div>
                                    <label for="password" class="block text-sm font-bold text-slate-700 mb-2">Kata Sandi Akun</label>
                                    <input type="password" name="password" id="password" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-800" placeholder="Minimal 8 Karakter" required>
                                </div>
                                <div>
                                    <label for="password_confirmation" class="block text-sm font-bold text-slate-700 mb-2">Konfirmasi Kata Sandi</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-800" placeholder="Ulangi Kata Sandi" required>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <div>
                                    <label for="hp" class="block text-sm font-bold text-slate-700 mb-2">Nomor Handphone (Aktif)</label>
                                    <input type="text" name="hp" id="hp" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-800" placeholder="Contoh: 081234567890" value="{{ old('hp') }}" required>
                                </div>
                                <div>
                                    <label for="alamat" class="block text-sm font-bold text-slate-700 mb-2">Alamat Properti / Domisili</label>
                                    <textarea name="alamat" id="alamat" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors resize-y text-slate-800" rows="5" placeholder="Tuliskan detail alamat lengkap pelanggan..." required>{{ old('alamat') }}</textarea>
                                </div>
                            </div>

                        </div>

                        <div class="flex flex-col-reverse sm:flex-row items-center justify-end gap-4 pt-8 mt-4 border-t border-gray-100">
                            <a href="{{ route('user.customer.index') }}" class="w-full sm:w-auto px-6 py-3.5 bg-white border border-gray-200 text-slate-600 font-bold rounded-xl hover:bg-gray-50 hover:text-slate-800 transition-colors text-center">
                                Batal & Kembali
                            </a>
                            <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-green-500 text-white font-bold rounded-xl hover:bg-green-600 hover:shadow-lg hover:shadow-green-500/30 transition-all duration-300">
                                Simpan Data Pelanggan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>