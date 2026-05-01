<section>
    <div class="mb-8 border-b border-gray-100 pb-6">
        <h2 class="text-xl font-bold text-slate-900">
            {{ __('Informasi Data Diri') }}
        </h2>
        <p class="mt-2 text-sm text-slate-500">
            {{ __("Perbarui nama, informasi kontak, dan alamat email akun Anda untuk kemudahan layanan.") }}
        </p>
    </div>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" class="text-sm font-bold text-slate-700 mb-2 block" />
            <x-text-input id="name" name="name" type="text" class="block w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors shadow-none text-slate-700" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-sm text-red-500" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="hp" :value="__('Nomor Handphone')" class="text-sm font-bold text-slate-700 mb-2 block" />
            <x-text-input id="hp" name="hp" type="text" class="block w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors shadow-none text-slate-700" :value="old('hp', $user->hp)" required autocomplete="hp" />
            <x-input-error class="mt-2 text-sm text-red-500" :messages="$errors->get('hp')" />
        </div>

        <div>
            <x-input-label for="alamat" :value="__('Alamat Lengkap')" class="text-sm font-bold text-slate-700 mb-2 block" />
            <x-text-input id="alamat" name="alamat" type="text" class="block w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors shadow-none text-slate-700" :value="old('alamat', $user->alamat)" required autocomplete="alamat" />
            <x-input-error class="mt-2 text-sm text-red-500" :messages="$errors->get('alamat')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email Address')" class="text-sm font-bold text-slate-700 mb-2 block" />
            <x-text-input id="email" name="email" type="email" class="block w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors shadow-none text-slate-700" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2 text-sm text-red-500" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 p-4 bg-yellow-50 rounded-xl border border-yellow-100">
                    <p class="text-sm text-yellow-800 font-medium">
                        {{ __('Alamat email Anda belum diverifikasi.') }}
                        <button form="send-verification" class="mt-2 underline text-sm text-cyan-600 hover:text-cyan-800 rounded-md focus:outline-none transition-colors">
                            {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-bold text-sm text-green-600">
                            {{ __('Link verifikasi baru telah dikirim ke alamat email Anda.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit" class="px-8 py-3.5 bg-cyan-500 text-white font-bold rounded-xl hover:bg-cyan-600 hover:shadow-lg hover:shadow-cyan-500/30 transition-all duration-300">
                {{ __('Simpan Data') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-x-2"
                    x-transition:enter-end="opacity-100 translate-x-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 translate-x-0"
                    x-transition:leave-end="opacity-0 translate-x-2"
                    x-init="setTimeout(() => show = false, 3000)"
                    class="text-sm font-bold text-green-500 flex items-center gap-1"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                    {{ __('Tersimpan.') }}
                </p>
            @endif
        </div>
    </form>
</section>