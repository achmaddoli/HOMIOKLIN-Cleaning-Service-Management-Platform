<x-authentikasi>
    <div class="min-h-screen bg-white flex selection:bg-cyan-200 selection:text-cyan-900 font-sans">
        
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 lg:p-24 bg-white relative">
            
            <a href="{{ route('home') }}" class="absolute top-8 left-8 text-slate-400 hover:text-cyan-600 flex items-center gap-2 font-medium transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" /></svg>
                Kembali
            </a>

            <div class="w-full max-w-md">
                <div class="flex items-center gap-2 mb-10 group">
                    <div class="w-12 h-12 bg-cyan-500 rounded-xl flex items-center justify-center shadow-lg shadow-cyan-500/30 group-hover:scale-105 transition-transform duration-300">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2"></path></svg>
                    </div>
                    <span class="text-3xl font-extrabold text-slate-800 tracking-tight">HOMIO<span class="text-cyan-600">KLIN</span></span>
                </div>

                <h1 class="text-3xl font-extrabold text-slate-900 mb-2 tracking-tight">Selamat Datang Kembali</h1>
                <p class="text-slate-500 mb-8">Silakan masuk ke akun Anda untuk mulai melakukan booking layanan kebersihan.</p>

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf
            
                    <div>
                        <x-input-label for="email" :value="__('Email Address')" class="text-sm font-bold text-slate-700 block mb-2" />
                        <x-text-input id="email" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Masukkan email Anda" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
                    </div>
            
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-sm font-bold text-slate-700 block mb-2" />
                        <x-text-input id="password" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors" type="password" name="password" required autocomplete="current-password" placeholder="Masukkan password Anda" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
                    </div>
            
                    <div class="flex items-center justify-between mt-4">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-cyan-600 shadow-sm focus:ring-cyan-500 w-4 h-4" name="remember">
                            <span class="ms-2 text-sm text-slate-600">{{ __('Ingat Saya') }}</span>
                        </label>
                    </div>
            
                    <div class="pt-2">
                        <button type="submit" class="w-full justify-center py-4 px-4 bg-cyan-500 text-white font-bold rounded-xl hover:bg-cyan-600 hover:shadow-lg hover:shadow-cyan-500/30 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                            {{ __('Log In ke Akun') }}
                        </button>
                    </div>
                </form>

                <div class="mt-8 text-center">
                    <p class="text-slate-600">Belum punya akun? <a href="{{ route('register') }}" class="text-cyan-600 font-bold hover:text-cyan-700 hover:underline transition-colors">Daftar Sekarang</a></p>
                </div>
            </div>
        </div>

        <div class="hidden lg:block lg:w-1/2 relative bg-cyan-50 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent z-10"></div>
            <img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="Clean Interior" class="absolute inset-0 w-full h-full object-cover">
            
            <div class="absolute bottom-16 left-16 right-16 z-20 text-white">
                <h2 class="text-4xl font-bold mb-4 leading-tight">Jadikan Rumah Anda<br>Nyaman dan Bersih</h2>
                <p class="text-lg text-white/80">Bergabung dengan ribuan pelanggan lainnya yang telah mempercayakan kebersihan properti mereka kepada HOMIOKLIN.</p>
            </div>
        </div>

    </div>
</x-authentikasi>