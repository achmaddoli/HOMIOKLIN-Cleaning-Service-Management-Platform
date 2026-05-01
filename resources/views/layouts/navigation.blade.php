<style>
    @media (min-width: 1024px) {
        header, main {
            margin-left: 17rem !important;
            transition: margin-left 0.3s ease-in-out;
        }
    }
</style>

<div x-data="{ sidebarOpen: false, activeMenu: '' }" class="font-sans text-slate-800">
    
    <div x-show="sidebarOpen" 
         x-transition.opacity 
         class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-40 lg:hidden" 
         @click="sidebarOpen = false">
    </div>

    <aside class="fixed inset-y-0 left-0 w-[17rem] bg-white border-r border-gray-100 z-50 transform transition-transform duration-300 flex flex-col shadow-[4px_0_24px_rgba(0,0,0,0.02)]"
           :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen, 'lg:translate-x-0': true}">
        
        <div class="h-20 flex items-center px-6 border-b border-gray-50 flex-shrink-0">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 bg-cyan-500 rounded-xl flex items-center justify-center shadow-lg shadow-cyan-500/30 group-hover:scale-105 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2"></path></svg>
                </div>
                <span class="text-xl font-extrabold text-slate-900 tracking-tight">HOMIO<span class="text-cyan-500">KLIN</span></span>
            </a>
        </div>

        <div class="flex-1 overflow-y-auto py-6 px-4 space-y-1.5 custom-scrollbar">
            
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition-colors {{ request()->routeIs('dashboard') ? 'bg-cyan-50 text-cyan-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-800' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                Dashboard
            </a>

            <a href="{{ route('admin.rekap.teknisi') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition-colors {{ request()->routeIs('admin.rekap.teknisi') ? 'bg-cyan-50 text-cyan-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-800' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                Rekap Pekerja
            </a>

            <div class="pt-4 pb-2">
                <p class="px-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Manajemen</p>
            </div>

            <div>
                <button @click="activeMenu = activeMenu === 'service' ? '' : 'service'" class="w-full flex items-center justify-between px-4 py-3 rounded-xl font-bold text-slate-500 hover:bg-slate-50 hover:text-slate-800 transition-colors">
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                        Layanan
                    </div>
                    <svg :class="{'rotate-180': activeMenu === 'service'}" class="w-4 h-4 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                </button>
                <div x-show="activeMenu === 'service'" class="pl-12 pr-4 py-2 space-y-1">
                    <a href="{{ route('category') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-500 hover:text-cyan-600 hover:bg-cyan-50">Kategori</a>
                    <a href="{{ route('admin.list.index') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-500 hover:text-cyan-600 hover:bg-cyan-50">List Layanan</a>
                </div>
            </div>

            <div>
                <button @click="activeMenu = activeMenu === 'booking' ? '' : 'booking'" class="w-full flex items-center justify-between px-4 py-3 rounded-xl font-bold text-slate-500 hover:bg-slate-50 hover:text-slate-800 transition-colors">
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        Pemesanan
                    </div>
                    <svg :class="{'rotate-180': activeMenu === 'booking'}" class="w-4 h-4 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                </button>
                <div x-show="activeMenu === 'booking'" class="pl-12 pr-4 py-2 space-y-1">
                    <a href="{{ route('booking.index') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-500 hover:text-cyan-600 hover:bg-cyan-50">Data Booking</a>
                    <a href="{{ route('admin.testimonial.index') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-500 hover:text-cyan-600 hover:bg-cyan-50">Testimoni</a>
                </div>
            </div>

            <div>
                <button @click="activeMenu = activeMenu === 'payment' ? '' : 'payment'" class="w-full flex items-center justify-between px-4 py-3 rounded-xl font-bold text-slate-500 hover:bg-slate-50 hover:text-slate-800 transition-colors">
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" /></svg>
                        Keuangan
                    </div>
                    <svg :class="{'rotate-180': activeMenu === 'payment'}" class="w-4 h-4 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                </button>
                <div x-show="activeMenu === 'payment'" class="pl-12 pr-4 py-2 space-y-1">
                    <a href="{{ route('type.index') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-500 hover:text-cyan-600 hover:bg-cyan-50">Metode Bayar</a>
                    <a href="{{ route('payment.index') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-500 hover:text-cyan-600 hover:bg-cyan-50">Riwayat Bayar</a>
                </div>
            </div>

            <div>
                <button @click="activeMenu = activeMenu === 'user' ? '' : 'user'" class="w-full flex items-center justify-between px-4 py-3 rounded-xl font-bold text-slate-500 hover:bg-slate-50 hover:text-slate-800 transition-colors">
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                        Pengguna
                    </div>
                    <svg :class="{'rotate-180': activeMenu === 'user'}" class="w-4 h-4 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                </button>
                <div x-show="activeMenu === 'user'" class="pl-12 pr-4 py-2 space-y-1">
                    <a href="{{ route('user.admin.index') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-500 hover:text-cyan-600 hover:bg-cyan-50">Kelola Admin</a>
                    <a href="{{ route('user.teknisi.index') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-500 hover:text-cyan-600 hover:bg-cyan-50">Kelola Pekerja</a>
                    <a href="{{ route('user.customer.index') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-500 hover:text-cyan-600 hover:bg-cyan-50">Kelola Customer</a>
                </div>
            </div>

        </div>
    </aside>

    <nav class="bg-white border-b border-gray-100 h-20 flex items-center justify-between px-4 sm:px-6 lg:px-8 transition-all duration-300 lg:ml-[17rem] shadow-sm relative z-30">
        
        <button @click="sidebarOpen = true" class="lg:hidden p-2 rounded-xl text-slate-500 hover:bg-cyan-50 hover:text-cyan-600 transition-colors">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
        </button>

        <div class="flex-1"></div>

        <div class="flex items-center">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="flex items-center gap-2 p-2 rounded-xl hover:bg-gray-50 transition-colors">
                        <div class="w-9 h-9 rounded-full bg-cyan-100 text-cyan-600 flex items-center justify-center font-bold text-sm">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <span class="hidden sm:block text-sm font-bold text-slate-700">{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')" class="font-semibold text-slate-600">
                        {{ __('Profile Saya') }}
                    </x-dropdown-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="font-semibold text-red-600 hover:bg-red-50">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </nav>
</div>