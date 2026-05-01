<x-authentikasi>
    <div class="min-h-screen bg-white flex selection:bg-cyan-200 selection:text-cyan-900 font-sans">
        
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 lg:p-16 bg-white relative">
            
            <a href="{{ route('home') }}" class="absolute top-8 left-8 text-slate-400 hover:text-cyan-600 flex items-center gap-2 font-medium transition-colors z-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" /></svg>
                Kembali
            </a>

            <div class="w-full max-w-md pt-10">
                <h1 class="text-3xl font-extrabold text-slate-900 mb-2 tracking-tight">Daftar Akun Baru</h1>
                <p class="text-slate-500 mb-8">Isi data diri Anda di bawah ini untuk mulai menggunakan layanan HOMIOKLIN.</p>

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf
            
                    <div>
                        <x-input-label for="name" :value="__('Nama Lengkap')" class="text-sm font-bold text-slate-700 block mb-1.5" />
                        <x-text-input id="name" class="block w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="John Doe" />
                        <x-input-error :messages="$errors->get('name')" class="mt-1 text-sm text-red-500" />
                    </div>
            
                    <div>
                        <x-input-label for="hp" :value="__('Nomor Handphone')" class="text-sm font-bold text-slate-700 block mb-1.5" />
                        <x-text-input id="hp" class="block w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors" type="text" name="hp" :value="old('hp')" required autocomplete="hp" placeholder="08123456789" />
                        <x-input-error :messages="$errors->get('hp')" class="mt-1 text-sm text-red-500" />
                    </div>
            
                    <div>
                        <x-input-label for="alamat" :value="__('Alamat Lengkap')" class="text-sm font-bold text-slate-700 block mb-1.5" />
                        <x-text-input id="alamat" class="block w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors" type="text" name="alamat" :value="old('alamat')" required autocomplete="alamat" placeholder="Jl. Contoh No. 123, Malang" />
                        <x-input-error :messages="$errors->get('alamat')" class="mt-1 text-sm text-red-500" />
                    </div>
            
                    <div>
                        <x-input-label for="email" :value="__('Email Address')" class="text-sm font-bold text-slate-700 block mb-1.5" />
                        <x-text-input id="email" class="block w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="email@contoh.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-500" />
                    </div>
            
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-sm font-bold text-slate-700 block mb-1.5" />
                        <x-text-input id="password" class="block w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors" type="password" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter" />
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-500" />
                    </div>
            
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="text-sm font-bold text-slate-700 block mb-1.5" />
                        <x-text-input id="password_confirmation" class="block w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-sm text-red-500" />
                    </div>
            
                    <div class="pt-4">
                        <button type="submit" class="w-full justify-center py-4 px-4 bg-cyan-500 text-white font-bold rounded-xl hover:bg-cyan-600 hover:shadow-lg hover:shadow-cyan-500/30 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                            {{ __('Daftar Sekarang') }}
                        </button>
                    </div>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-slate-600">Sudah punya akun? <a href="{{ route('login') }}" class="text-cyan-600 font-bold hover:text-cyan-700 hover:underline transition-colors">Masuk di sini</a></p>
                </div>
            </div>
        </div>

        <div class="hidden lg:block lg:w-1/2 relative bg-cyan-50 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-slate-900/20 to-transparent z-10"></div>
            <img src="https://images.unsplash.com/photo-1527515637462-cff94eecc1ac?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="Clean Service" class="absolute inset-0 w-full h-full object-cover">
            
            <div class="absolute bottom-16 left-16 right-16 z-20 text-white">
                <div class="flex gap-2 mb-4">
                    <svg class="w-6 h-6 text-yellow-400 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                    <svg class="w-6 h-6 text-yellow-400 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                    <svg class="w-6 h-6 text-yellow-400 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                    <svg class="w-6 h-6 text-yellow-400 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                    <svg class="w-6 h-6 text-yellow-400 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                </div>
                <p class="text-xl italic text-white/90 font-light mb-4">"Pelayanan luar biasa, staf ramah, dan rumah saya bersih seperti baru kembali. Proses booking lewat web sangat mudah!"</p>
                <p class="font-bold text-white">— Sarah A., Pengguna HOMIOKLIN</p>
            </div>
        </div>

    </div>
</x-authentikasi>