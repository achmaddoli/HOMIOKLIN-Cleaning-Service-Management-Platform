<footer class="bg-white border-t border-gray-100 pt-16 pb-8 text-slate-600 font-sans selection:bg-cyan-200 selection:text-cyan-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            
            <div class="col-span-1 md:col-span-2">
                <a href="{{ route('home') }}" class="flex items-center gap-2 mb-4 group">
                    <div class="w-10 h-10 bg-cyan-500 rounded-xl flex items-center justify-center shadow-lg shadow-cyan-500/30 group-hover:scale-105 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2"></path></svg>
                    </div>
                    <span class="text-xl font-extrabold text-slate-800 tracking-tight">HOMIO<span class="text-cyan-600">KLIN</span></span>
                </a>
                <p class="text-sm leading-relaxed max-w-sm text-slate-500">
                    Jasa bersih rumah, kos, apartemen, dan cuci furniture profesional di Malang. Solusi tepercaya dan praktis untuk memastikan hunian Anda selalu bersih, nyaman, dan sehat.
                </p>
            </div>

            <div>
                <h4 class="font-bold text-slate-900 mb-6 tracking-wide">Layanan Kami</h4>
                <ul class="space-y-3 text-sm font-medium">
                    <li><a href="{{ route('service') }}" class="text-slate-500 hover:text-cyan-500 hover:translate-x-1 transition-all inline-block">Home Cleaning</a></li>
                    <li><a href="{{ route('service') }}" class="text-slate-500 hover:text-cyan-500 hover:translate-x-1 transition-all inline-block">Cuci Sofa & Kasur</a></li>
                    <li><a href="{{ route('service') }}" class="text-slate-500 hover:text-cyan-500 hover:translate-x-1 transition-all inline-block">Deep Cleaning</a></li>
                    <li><a href="{{ route('service') }}" class="text-slate-500 hover:text-cyan-500 hover:translate-x-1 transition-all inline-block">General Cleaning</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold text-slate-900 mb-6 tracking-wide">Hubungi Kami</h4>
                <ul class="space-y-4 text-sm font-medium">
                    <li class="flex items-start gap-3 text-slate-500">
                        <div class="w-8 h-8 bg-cyan-50 text-cyan-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <span class="leading-relaxed">Malang <br> Jawa Timur</span>
                    </li>
                    <li class="flex items-center gap-3 text-slate-500">
                        <div class="w-8 h-8 bg-cyan-50 text-cyan-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        0812-4925-3286
                    </li>
                </ul>
            </div>

        </div>

        <div class="pt-8 border-t border-gray-100 flex flex-col md:flex-row justify-center md:justify-between items-center gap-4">
            <p class="text-sm font-medium text-slate-400">Copyright © {{ date('Y') }} HOMIOKLIN. All rights reserved.</p>
            <div class="flex gap-4">
                <a href="https://www.instagram.com/homioklin" target="_blank" class="text-slate-400 hover:text-pink-500 transition-colors"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg></a>
            </div>
        </div>
    </div>
</footer>