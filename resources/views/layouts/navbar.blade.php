<nav class="fixed w-full z-50 top-0 transition-all duration-300 bg-white/80 backdrop-blur-md border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            <div class="flex-shrink-0 flex items-center gap-2">
                <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                    <div class="w-10 h-10 bg-cyan-500 rounded-xl flex items-center justify-center shadow-lg shadow-cyan-500/30 group-hover:scale-105 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2"></path></svg>
                    </div>
                    <span class="text-xl font-extrabold text-slate-800 tracking-tight">HOMIO<span class="text-cyan-600">KLIN</span></span>
                </a>
            </div>

            <div class="flex items-center lg:hidden">
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="p-2 rounded-lg text-gray-600 hover:bg-cyan-50 hover:text-cyan-600 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
                    </div>
                    <ul tabindex="0" class="menu menu-sm dropdown-content bg-white rounded-2xl z-[1] mt-3 w-52 p-3 shadow-[0_8px_30px_rgb(0,0,0,0.12)] border border-gray-100 gap-1">
                        <li><a href="{{ route('home') }}" class="px-4 py-2 font-medium text-gray-600 hover:text-cyan-600 hover:bg-cyan-50 rounded-lg">Home</a></li>
                        <li><a href="{{ route('about') }}" class="px-4 py-2 font-medium text-gray-600 hover:text-cyan-600 hover:bg-cyan-50 rounded-lg">About</a></li>
                        <li><a href="{{ route('service') }}" class="px-4 py-2 font-medium text-gray-600 hover:text-cyan-600 hover:bg-cyan-50 rounded-lg">Service</a></li>
                        @if (Route::has('login'))
                            @auth
                                <li><a href="{{ route('bookings.create') }}" class="px-4 py-2 font-medium text-cyan-600 bg-cyan-50 hover:bg-cyan-100 rounded-lg mt-2">Booking Sekarang</a></li>
                            @else
                                <li><a href="{{ route('login') }}" class="px-4 py-2 font-medium text-cyan-600 bg-cyan-50 hover:bg-cyan-100 rounded-lg mt-2">Mulai Bersih-bersih</a></li>
                            @endauth
                        @endif
                    </ul>
                </div>
                @if (Route::has('login'))
                        @auth
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="flex items-center gap-2 p-1.5 rounded-full hover:bg-gray-50 transition-colors">
                                        <div class="w-10 h-10 rounded-full bg-cyan-100 text-cyan-600 flex items-center justify-center font-bold border-2 border-white shadow-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
                                        </div>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link-user :href="route('riwayat')">{{ __('Riwayat') }}</x-dropdown-link-user>
                                    <x-dropdown-link-user :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link-user>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link-user :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-500 hover:bg-red-500 hover:text-white">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link-user>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        
                        @endauth
                    @endif
            </div>

            <div class="hidden lg:flex lg:items-center lg:gap-8">
                <a href="{{ route('home') }}" class="text-sm font-semibold text-gray-600 hover:text-cyan-600 transition-colors duration-300">Home</a>
                <a href="{{ route('about') }}" class="text-sm font-semibold text-gray-600 hover:text-cyan-600 transition-colors duration-300">About</a>
                <a href="{{ route('service') }}" class="text-sm font-semibold text-gray-600 hover:text-cyan-600 transition-colors duration-300">Service</a>

                <div class="flex items-center gap-4 border-l border-gray-200 pl-8 ml-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('bookings.create') }}" class="px-6 py-2.5 bg-cyan-500 text-white text-sm font-semibold rounded-xl hover:bg-cyan-600 hover:shadow-lg hover:shadow-cyan-500/30 hover:-translate-y-0.5 transition-all duration-300">Booking Sekarang</a>

                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="flex items-center gap-2 p-1.5 rounded-full hover:bg-gray-50 transition-colors">
                                        <div class="w-10 h-10 rounded-full bg-cyan-100 text-cyan-600 flex items-center justify-center font-bold border-2 border-white shadow-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
                                        </div>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link-user :href="route('riwayat')">{{ __('Riwayat') }}</x-dropdown-link-user>
                                    <x-dropdown-link-user :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link-user>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link-user :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-500 hover:bg-red-500 hover:text-white">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link-user>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @else
                            <a href="{{ route('login') }}" class="px-6 py-2.5 bg-cyan-500 text-white text-sm font-semibold rounded-xl hover:bg-cyan-600 hover:shadow-lg hover:shadow-cyan-500/30 transition-all duration-300">Mulai Bersih-bersih</a>
                        @endauth
                    @endif
                </div>
            </div>

        </div>
    </div>
</nav>
