<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-2xl text-slate-800 leading-tight">
            {{ __('Dashboard Overview') }}
        </h2>
    </x-slot>

    <div class="py-10 min-h-screen bg-slate-50 selection:bg-cyan-200 selection:text-cyan-900">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            
            <div class="bg-white rounded-[1.5rem] p-6 shadow-[0_4px_20px_rgb(0,0,0,0.02)] border border-gray-100 flex items-center gap-5 hover:shadow-lg transition-shadow duration-300">
                <div class="w-14 h-14 rounded-2xl bg-indigo-50 text-indigo-500 flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-500">Total Booking</p>
                    <p class="text-3xl font-extrabold text-slate-800 mt-0.5">{{ $totalBooking }}</p>
                </div>
            </div>

            <div class="bg-white rounded-[1.5rem] p-6 shadow-[0_4px_20px_rgb(0,0,0,0.02)] border border-gray-100 flex items-center gap-5 hover:shadow-lg transition-shadow duration-300">
                <div class="w-14 h-14 rounded-2xl bg-slate-100 text-slate-600 flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-500">Menunggu</p>
                    <p class="text-3xl font-extrabold text-slate-800 mt-0.5">{{ $totalMenunggu }}</p>
                </div>
            </div>

            <div class="bg-white rounded-[1.5rem] p-6 shadow-[0_4px_20px_rgb(0,0,0,0.02)] border border-gray-100 flex items-center gap-5 hover:shadow-lg transition-shadow duration-300">
                <div class="w-14 h-14 rounded-2xl bg-cyan-50 text-cyan-500 flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-500">Diterima</p>
                    <p class="text-3xl font-extrabold text-slate-800 mt-0.5">{{ $totalDiterima }}</p>
                </div>
            </div>

            <div class="bg-white rounded-[1.5rem] p-6 shadow-[0_4px_20px_rgb(0,0,0,0.02)] border border-gray-100 flex items-center gap-5 hover:shadow-lg transition-shadow duration-300">
                <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-500 flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-500">Dalam Proses</p>
                    <p class="text-3xl font-extrabold text-slate-800 mt-0.5">{{ $totalProses }}</p>
                </div>
            </div>

            <div class="bg-white rounded-[1.5rem] p-6 shadow-[0_4px_20px_rgb(0,0,0,0.02)] border border-gray-100 flex items-center gap-5 hover:shadow-lg transition-shadow duration-300">
                <div class="w-14 h-14 rounded-2xl bg-yellow-50 text-yellow-500 flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-500">Selesai</p>
                    <p class="text-3xl font-extrabold text-slate-800 mt-0.5">{{ $totalSelesai }}</p>
                </div>
            </div>

            <div class="bg-white rounded-[1.5rem] p-6 shadow-[0_4px_20px_rgb(0,0,0,0.02)] border border-gray-100 flex items-center gap-5 hover:shadow-lg transition-shadow duration-300">
                <div class="w-14 h-14 rounded-2xl bg-green-50 text-green-500 flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-500">Dibayar</p>
                    <p class="text-3xl font-extrabold text-slate-800 mt-0.5">{{ $totalDibayar }}</p>
                </div>
            </div>

            <div class="bg-white rounded-[1.5rem] p-6 shadow-[0_4px_20px_rgb(0,0,0,0.02)] border border-gray-100 flex items-center gap-5 hover:shadow-lg transition-shadow duration-300">
                <div class="w-14 h-14 rounded-2xl bg-purple-50 text-purple-500 flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-500">Jumlah Customer</p>
                    <p class="text-3xl font-extrabold text-slate-800 mt-0.5">{{ $roleUserCount }}</p>
                </div>
            </div>

            <div class="bg-white rounded-[1.5rem] p-6 shadow-[0_4px_20px_rgb(0,0,0,0.02)] border border-gray-100 flex items-center gap-5 hover:shadow-lg transition-shadow duration-300">
                <div class="w-14 h-14 rounded-2xl bg-orange-50 text-orange-500 flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-500">Pekerja Lapangan</p>
                    <p class="text-3xl font-extrabold text-slate-800 mt-0.5">{{ $roleCleanerCount }}</p>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
            <div class="bg-gradient-to-br from-cyan-500 to-blue-600 rounded-[2rem] p-8 md:p-10 shadow-lg shadow-cyan-500/20 text-white flex justify-between items-center relative overflow-hidden">
                <div class="absolute -right-10 -top-10 w-48 h-48 bg-white/10 rounded-full blur-3xl"></div>
                <div class="relative z-10">
                    <p class="text-cyan-100 font-semibold text-lg mb-1">Total Pendapatan</p>
                    <p class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
                </div>
                <div class="hidden md:flex w-24 h-24 bg-white/20 backdrop-blur-sm rounded-full items-center justify-center relative z-10 shadow-inner">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-6 pb-12">
            <div class="bg-white rounded-[2rem] shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-gray-100 p-6 md:p-8">
                <h3 class="text-lg font-bold text-slate-800 mb-6">Statistik Pemesanan Tahunan</h3>
                <div class="relative h-72 w-full">
                    <canvas id="bookingsChart"></canvas>
                </div>
            </div>
            
            <div class="bg-white rounded-[2rem] shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-gray-100 p-6 md:p-8">
                <h3 class="text-lg font-bold text-slate-800 mb-6">Tren Pendapatan Tahunan</h3>
                <div class="relative h-72 w-full">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        const bookingsData = @json($bookingsData);
        const revenueData = @json($revenueData);
        const labels = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agt", "Sep", "Okt", "Nov", "Des"];

        // Chart untuk Jumlah Booking per Bulan (Bar Chart)
        const bookingsCtx = document.getElementById('bookingsChart').getContext('2d');
        new Chart(bookingsCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Booking',
                    data: bookingsData,
                    backgroundColor: 'rgba(6, 182, 212, 0.9)', // Warna Cyan Tailwind
                    borderRadius: 8, // Ujung bar membulat
                    borderSkipped: false,
                    barPercentage: 0.6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { 
                        beginAtZero: true,
                        grid: { borderDash: [5, 5], color: '#f1f5f9' },
                        ticks: { stepSize: 1, color: '#64748b' }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { color: '#64748b' }
                    }
                }
            }
        });

        // Chart untuk Total Pendapatan per Bulan (Line Chart)
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Pendapatan (Rp)',
                    data: revenueData,
                    fill: true,
                    backgroundColor: 'rgba(6, 182, 212, 0.1)', // Fill bawah garis transparan
                    borderColor: 'rgba(6, 182, 212, 1)', // Warna Cyan solid
                    pointBackgroundColor: '#fff',
                    pointBorderColor: 'rgba(6, 182, 212, 1)',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    tension: 0.4 // Garis melengkung halus (smooth curve)
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { 
                        beginAtZero: true,
                        grid: { borderDash: [5, 5], color: '#f1f5f9' },
                        ticks: { 
                            color: '#64748b',
                            callback: function(value) { return 'Rp' + value / 1000 + 'k'; }
                        }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { color: '#64748b' }
                    }
                }
            }
        });
    </script>
</x-app-layout>