<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-2xl text-slate-800 leading-tight">
            {{ __('Dashboard Pekerja') }}
        </h2>
    </x-slot>

    <style>
        .dataTables_wrapper .dataTables_filter input { border: 1px solid #e2e8f0; border-radius: 0.75rem; padding: 0.5rem 1rem; outline: none; margin-left: 0.5rem; background-color: #f8fafc; }
        .dataTables_wrapper .dataTables_filter input:focus { border-color: #06b6d4; box-shadow: 0 0 0 2px rgba(6, 182, 212, 0.2); background-color: #fff; }
        .dataTables_wrapper .dataTables_length select { border: 1px solid #e2e8f0; border-radius: 0.5rem; padding: 0.25rem 2rem 0.25rem 0.5rem; background-color: #f8fafc; }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current { background: #06b6d4 !important; color: white !important; border: none !important; border-radius: 0.5rem; box-shadow: 0 4px 6px -1px rgba(6, 182, 212, 0.2); }
        .dataTables_wrapper .dataTables_paginate .paginate_button { border-radius: 0.5rem !important; border: transparent !important; }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover { background: #f1f5f9 !important; color: #0f172a !important; border: transparent !important; }
        table.dataTable.no-footer { border-bottom: 1px solid #f1f5f9 !important; }
        .dataTables_wrapper { overflow-x: auto; width: 100%; }
    </style>

    <div class="py-10 min-h-screen bg-slate-50 selection:bg-cyan-200 selection:text-cyan-900 font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                <div class="bg-white rounded-2xl p-5 shadow-[0_4px_20px_rgb(0,0,0,0.02)] border border-gray-100 text-center hover:-translate-y-1 transition-transform">
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Total Tugas</p>
                    <p class="text-3xl font-extrabold text-slate-800">{{ $totalBooking }}</p>
                </div>
                <div class="bg-white rounded-2xl p-5 shadow-[0_4px_20px_rgb(0,0,0,0.02)] border border-gray-100 text-center hover:-translate-y-1 transition-transform">
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Menunggu</p>
                    <p class="text-3xl font-extrabold text-slate-800">{{ $totalMenunggu }}</p>
                </div>
                <div class="bg-cyan-50 rounded-2xl p-5 shadow-[0_4px_20px_rgba(6,182,212,0.05)] border border-cyan-100 text-center hover:-translate-y-1 transition-transform">
                    <p class="text-xs font-bold text-cyan-600 uppercase tracking-wider mb-1">Diterima</p>
                    <p class="text-3xl font-extrabold text-cyan-700">{{ $totalDiterima }}</p>
                </div>
                <div class="bg-blue-50 rounded-2xl p-5 shadow-[0_4px_20px_rgba(59,130,246,0.05)] border border-blue-100 text-center hover:-translate-y-1 transition-transform">
                    <p class="text-xs font-bold text-blue-600 uppercase tracking-wider mb-1">Dikerjakan</p>
                    <p class="text-3xl font-extrabold text-blue-700">{{ $totalProses }}</p>
                </div>
                <div class="bg-yellow-50 rounded-2xl p-5 shadow-[0_4px_20px_rgba(234,179,8,0.05)] border border-yellow-100 text-center hover:-translate-y-1 transition-transform">
                    <p class="text-xs font-bold text-yellow-600 uppercase tracking-wider mb-1">Selesai</p>
                    <p class="text-3xl font-extrabold text-yellow-700">{{ $totalSelesai }}</p>
                </div>
                <div class="bg-green-50 rounded-2xl p-5 shadow-[0_4px_20px_rgba(34,197,94,0.05)] border border-green-100 text-center hover:-translate-y-1 transition-transform">
                    <p class="text-xs font-bold text-green-600 uppercase tracking-wider mb-1">Dibayar</p>
                    <p class="text-3xl font-extrabold text-green-700">{{ $totalDibayar }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-1 bg-white rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 overflow-hidden">
                    <div class="p-6 md:p-8 h-full flex flex-col">
                        <div class="mb-4">
                            <h3 class="text-lg font-bold text-slate-800">Statistik Penugasan</h3>
                            <p class="text-sm text-slate-500">Jumlah tugas per bulan.</p>
                        </div>
                        <div class="relative flex-grow min-h-[250px]">
                            <canvas id="bookingsChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 bg-white rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 overflow-hidden">
                    <div class="p-6 md:p-8">
                        
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
                            <div>
                                <h3 class="text-lg font-bold text-slate-800">Kinerja Rekan Pekerja</h3>
                                <p class="text-sm text-slate-500">Pantau beban kerja seluruh pekerja lapangan.</p>
                            </div>
                            
                            <div class="flex items-center gap-2 w-full md:w-auto">
                                <select id="filter-month" class="block w-full md:w-40 px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-700 font-medium cursor-pointer text-sm">
                                    <option value="">Bulan</option>
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}">{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
                                    @endfor
                                </select>
                                <button id="filter-button" class="px-5 py-2.5 bg-cyan-500 text-white font-bold rounded-xl hover:bg-cyan-600 transition-all duration-300 text-sm">
                                    Filter
                                </button>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table id="example" class="w-full text-left border-collapse" style="width:100%;">
                                <thead>
                                    <tr class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wider border-b border-gray-100">
                                        <th class="px-4 py-4 font-bold rounded-tl-xl w-1/3" data-priority="1">Nama Pekerja</th>
                                        <th class="px-4 py-4 font-bold text-center" data-priority="2">Total Tugas</th>
                                        <th class="px-4 py-4 font-bold text-center" data-priority="3">Tugas (Bulan Ini)</th>
                                        <th class="px-4 py-4 font-bold text-center rounded-tr-xl" data-priority="4">Status Lapangan</th>
                                    </tr>
                                </thead>
                                <tbody class="text-slate-700 text-sm">
                                    @foreach ($rekapTeknisi as $rekap)
                                    <tr class="border-b border-gray-50 hover:bg-slate-50/50 transition-colors duration-200">
                                        <td class="px-4 py-4 font-bold text-slate-800 flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-full bg-cyan-100 text-cyan-600 flex items-center justify-center text-xs flex-shrink-0">
                                                {{ substr($rekap['name'], 0, 1) }}
                                            </div>
                                            {{ $rekap['name'] }}
                                        </td>
                                        <td class="px-4 py-4 text-center font-medium">{{ $rekap['total_service'] }}</td>
                                        <td class="px-4 py-4 text-center font-medium">{{ $rekap['monthly_service'] }}</td>
                                        <td class="px-4 py-4 text-center">
                                            @if ($rekap['status'] == 'On Job')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold bg-orange-50 text-orange-600 border border-orange-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-orange-500 mr-1.5 animate-pulse"></span>Sedang Bertugas
                                                </span>
                                            @elseif ($rekap['status'] == 'Available')
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold bg-green-50 text-green-600 border border-green-100">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></span>Tersedia
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold bg-slate-50 text-slate-600 border border-slate-100">
                                                    {{ $rekap['status'] }}
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        const bookingsData = @json($bookingsData);
        const labels = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agt", "Sep", "Okt", "Nov", "Des"];

        // Chart untuk Jumlah Booking per Bulan (Bar Chart) - Modern UI
        const bookingsCtx = document.getElementById('bookingsChart').getContext('2d');
        new Chart(bookingsCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Tugas',
                    data: bookingsData,
                    backgroundColor: 'rgba(6, 182, 212, 0.8)', // Tailwind Cyan 500
                    borderRadius: 6,
                    borderSkipped: false,
                    barPercentage: 0.5
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
                        ticks: { color: '#64748b', font: { size: 10 } }
                    }
                }
            }
        });

        // Skrip Filter AJAX
        document.addEventListener('DOMContentLoaded', function () {
            const filterButton = document.getElementById('filter-button');
            const filterMonth = document.getElementById('filter-month');

            filterButton.addEventListener('click', function () {
                const selectedMonth = filterMonth.value;
                const originalBtnText = filterButton.innerHTML;
                filterButton.innerHTML = '...'; // Indikator loading ringan

                fetch(`{{ route('teknisi.dashboard') }}?month=${selectedMonth}`, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/json',
                    },
                })
                .then((response) => response.json())
                .then((data) => {
                    filterButton.innerHTML = 'Filter';
                    const tableBody = document.querySelector('#example tbody');
                    tableBody.innerHTML = '';

                    data.forEach((rekap) => {
                        const isJob = rekap.status === 'On Job';
                        const badgeColor = isJob ? 'bg-orange-50 text-orange-600 border-orange-100' : 'bg-green-50 text-green-600 border-green-100';
                        const dotColor = isJob ? 'bg-orange-500 animate-pulse' : 'bg-green-500';
                        const statusText = isJob ? 'Sedang Bertugas' : 'Tersedia';

                        // Injeksi Baris Baru dengan Styling Tailwind
                        const row = `
                            <tr class="border-b border-gray-50 hover:bg-slate-50/50 transition-colors duration-200">
                                <td class="px-4 py-4 font-bold text-slate-800 flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-cyan-100 text-cyan-600 flex items-center justify-center text-xs flex-shrink-0">
                                        ${rekap.name.substring(0, 1)}
                                    </div>
                                    ${rekap.name}
                                </td>
                                <td class="px-4 py-4 text-center font-medium">${rekap.total_service}</td>
                                <td class="px-4 py-4 text-center font-medium">${rekap.monthly_service}</td>
                                <td class="px-4 py-4 text-center">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold border ${badgeColor}">
                                        <span class="w-1.5 h-1.5 rounded-full mr-1.5 ${dotColor}"></span>${statusText}
                                    </span>
                                </td>
                            </tr>
                        `;
                        tableBody.insertAdjacentHTML('beforeend', row);
                    });
                })
                .catch((error) => {
                    console.error('Error fetching data:', error);
                    filterButton.innerHTML = 'Filter';
                });
            });
        });
    </script>
</x-app-layout>