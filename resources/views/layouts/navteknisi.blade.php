<style>
    @media (min-width: 1024px) {
        header, main {
            margin-left: 17rem !important;
            transition: margin-left 0.3s ease-in-out;
        }
    }
</style>

<div x-data="{ sidebarOpen: false }" class="font-sans text-slate-800">
    
    <div x-show="sidebarOpen" 
         x-transition.opacity 
         class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-40 lg:hidden" 
         @click="sidebarOpen = false">
    </div>

    <aside class="fixed inset-y-0 left-0 w-[17rem] bg-white border-r border-gray-100 z-50 transform transition-transform duration-300 flex flex-col shadow-[4px_0_24px_rgba(0,0,0,0.02)]"
           :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen, 'lg:translate-x-0': true}">
        
        <div class="h-20 flex items-center px-6 border-b border-gray-50 flex-shrink-0">
            <a href="{{ route('teknisi.dashboard') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 bg-cyan-500 rounded-xl flex items-center justify-center shadow-lg shadow-cyan-500/30 group-hover:scale-105 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2"></path></svg>
                </div>
                <span class="text-xl font-extrabold text-slate-900 tracking-tight">HOMIO<span class="text-cyan-500">KLIN</span></span>
            </a>
        </div>

        <div class="flex-1 overflow-y-auto py-6 px-4 space-y-2 custom-scrollbar">
            
            <div class="pb-2">
                <p class="px-4 text-xs font-bold text-slate-400 uppercase tracking-wider">Menu Pekerja</p>
            </div>

            <a href="{{ route('teknisi.dashboard') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-xl font-bold transition-colors {{ request()->routeIs('teknisi.dashboard') ? 'bg-cyan-50 text-cyan-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-800' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                Dashboard
            </a>

            <a href="{{ route('teknisi.booking.index') }}" class="flex items-center gap-3 px-4 py-3.5 rounded-xl font-bold transition-colors {{ request()->routeIs('teknisi.booking.index') ? 'bg-cyan-50 text-cyan-600' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-800' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" /></svg>
                Tugas Layanan
            </a>
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
                    <button class="flex items-center gap-3 p-2 rounded-xl hover:bg-gray-50 transition-colors">
                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-bold text-slate-700 leading-tight">{{ Auth::user()->name }}</p>
                            <p class="text-xs font-medium text-cyan-600">Pekerja Lapangan</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-cyan-100 text-cyan-600 flex items-center justify-center font-bold text-sm">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')" class="font-semibold text-slate-600">
                        {{ __('Pengaturan Profil') }}
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