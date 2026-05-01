<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-orange-100 text-orange-500 rounded-xl flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
            </div>
            <h2 class="font-extrabold text-2xl text-slate-800 leading-tight">
                {{ __('Edit Akun Pekerja Lapangan') }}
            </h2>
        </div>
    </x-slot>

    <div class="bg-slate-50 min-h-screen py-10 font-sans selection:bg-cyan-200 selection:text-cyan-900">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 overflow-hidden">
                <div class="p-8 md:p-12">
                    
                    <div class="mb-8 border-b border-gray-100 pb-6">
                        <h3 class="text-xl font-bold text-slate-800">Perbarui Profil Staf Lapangan</h3>
                        <p class="text-slate-500 mt-1">Ubah data identitas, kontak, atau kata sandi untuk akun <span class="font-bold text-slate-700">{{ $user->name }}</span>.</p>
                    </div>

                    <form action="{{ route('user.teknisi.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            
                            <div class="space-y-6">
                                <div>
                                    <label for="name" class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap</label>
                                    <input type="text" name="name" id="name" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-800" value="{{ old('name', $user->name) }}" required>
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-bold text-slate-700 mb-2">Alamat Email Staf</label>
                                    <input type="email" name="email" id="email" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-800" value="{{ old('email', $user->email) }}" required>
                                </div>
                                
                                <div class="bg-orange-50/50 border border-orange-100 p-5 rounded-2xl">
                                    <p class="text-xs font-bold text-orange-600 mb-4 uppercase tracking-wider">Perbarui Sandi (Opsional)</p>
                                    <div class="space-y-4">
                                        <div>
                                            <label for="password" class="block text-sm font-bold text-slate-700 mb-2">Kata Sandi Baru</label>
                                            <input type="password" name="password" id="password" class="block w-full px-4 py-3.5 rounded-xl border border-white bg-white focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition-colors text-slate-800 shadow-sm" placeholder="Biarkan kosong jika tidak diubah">
                                        </div>
                                        <div>
                                            <label for="password_confirmation" class="block text-sm font-bold text-slate-700 mb-2">Konfirmasi Kata Sandi</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation" class="block w-full px-4 py-3.5 rounded-xl border border-white bg-white focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition-colors text-slate-800 shadow-sm" placeholder="Ulangi Kata Sandi">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <div>
                                    <label for="hp" class="block text-sm font-bold text-slate-700 mb-2">Nomor Handphone (Aktif)</label>
                                    <input type="text" name="hp" id="hp" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-800" value="{{ old('hp', $user->hp) }}" required>
                                </div>
                                <div>
                                    <label for="alamat" class="block text-sm font-bold text-slate-700 mb-2">Alamat Domisili Lengkap</label>
                                    <textarea name="alamat" id="alamat" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors resize-y text-slate-800" rows="5" required>{{ old('alamat', $user->alamat) }}</textarea>
                                </div>
                            </div>

                        </div>

                        <div class="flex flex-col-reverse sm:flex-row items-center justify-end gap-4 pt-8 mt-4 border-t border-gray-100">
                            <a href="{{ route('user.teknisi.index') }}" class="w-full sm:w-auto px-6 py-3.5 bg-white border border-gray-200 text-slate-600 font-bold rounded-xl hover:bg-gray-50 hover:text-slate-800 transition-colors text-center">
                                Batal & Kembali
                            </a>
                            <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-orange-500 text-white font-bold rounded-xl hover:bg-orange-600 hover:shadow-lg hover:shadow-orange-500/30 transition-all duration-300">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>