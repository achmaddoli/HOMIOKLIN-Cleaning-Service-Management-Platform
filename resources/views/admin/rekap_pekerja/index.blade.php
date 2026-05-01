<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-2xl text-slate-800 leading-tight">
            {{ __('Rekap Pekerja Lapangan') }}
        </h2>
    </x-slot>

    <style>
        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #e2e8f0;
            border-radius: 0.75rem;
            padding: 0.5rem 1rem;
            outline: none;
            margin-left: 0.5rem;
            background-color: #f8fafc;
        }
        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: #06b6d4;
            box-shadow: 0 0 0 2px rgba(6, 182, 212, 0.2);
            background-color: #fff;
        }
        .dataTables_wrapper .dataTables_length select {
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            padding: 0.25rem 2rem 0.25rem 0.5rem;
            background-color: #f8fafc;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #06b6d4 !important;
            color: white !important;
            border: none !important;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(6, 182, 212, 0.2);
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border-radius: 0.5rem !important;
            border: transparent !important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #f1f5f9 !important;
            color: #0f172a !important;
            border: transparent !important;
        }
        table.dataTable.no-footer {
            border-bottom: 1px solid #f1f5f9 !important;
        }
    </style>

    <div class="py-10 min-h-screen bg-slate-50 selection:bg-cyan-200 selection:text-cyan-900 font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 overflow-hidden">
                <div class="p-6 md:p-8">

                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8 bg-slate-50/50 p-4 rounded-2xl border border-gray-100">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-cyan-100 text-cyan-600 rounded-xl flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" /></svg>
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-slate-800">Filter Data</h3>
                                <p class="text-xs text-slate-500">Tampilkan kinerja berdasarkan bulan</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-3 w-full md:w-auto">
                            <select id="filter-month" class="block w-full md:w-48 px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-700 font-medium cursor-pointer">
                                <option value="">Bulan</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}">{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
                                @endfor
                            </select>
                            <button id="filter-button" class="px-6 py-2.5 bg-cyan-500 text-white font-bold rounded-xl hover:bg-cyan-600 hover:shadow-lg hover:shadow-cyan-500/30 transition-all duration-300 flex items-center gap-2">
                                Terapkan
                            </button>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table id="example" class="w-full text-left border-collapse" style="width:100%;">
                            <thead>
                                <tr class="bg-slate-50 text-slate-500 text-sm uppercase tracking-wider border-b border-gray-100">
                                    <th class="px-6 py-4 font-bold rounded-tl-xl" data-priority="1">Nama Pekerja</th>
                                    <th class="px-6 py-4 font-bold text-center" data-priority="2">Total Pengerjaan</th>
                                    <th class="px-6 py-4 font-bold text-center" data-priority="3">Pengerjaan (Bulan Ini)</th>
                                    <th class="px-6 py-4 font-bold text-center rounded-tr-xl" data-priority="4">Status Lapangan</th>
                                </tr>
                            </thead>
                            <tbody class="text-slate-700">
                                @foreach ($rekapTeknisi as $rekap)
                                <tr class="border-b border-gray-50 hover:bg-slate-50/50 transition-colors duration-200">
                                    <td class="px-6 py-4 font-semibold text-slate-800 flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-cyan-100 text-cyan-600 flex items-center justify-center font-bold text-xs flex-shrink-0">
                                            {{ substr($rekap['name'], 0, 1) }}
                                        </div>
                                        {{ $rekap['name'] }}
                                    </td>
                                    <td class="px-6 py-4 text-center font-medium">{{ $rekap['total_service'] }}</td>
                                    <td class="px-6 py-4 text-center font-medium">{{ $rekap['monthly_service'] }}</td>
                                    <td class="px-6 py-4 text-center">
                                        @if ($rekap['status'] == 'On Job')
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-orange-50 text-orange-600 border border-orange-100">
                                                <span class="w-1.5 h-1.5 rounded-full bg-orange-500 mr-2 animate-pulse"></span>Sedang Bertugas
                                            </span>
                                        @elseif ($rekap['status'] == 'Available')
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-50 text-green-600 border border-green-100">
                                                <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-2"></span>Tersedia
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-slate-50 text-slate-600 border border-slate-100">
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filterButton = document.getElementById('filter-button');
            const filterMonth = document.getElementById('filter-month');

            filterButton.addEventListener('click', function () {
                const selectedMonth = filterMonth.value;

                // Tambahkan efek loading (opsional)
                const originalBtnText = filterButton.innerHTML;
                filterButton.innerHTML = '<svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';

                // Kirim request AJAX
                fetch(`{{ route('admin.rekap.teknisi') }}?month=${selectedMonth}`, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/json',
                    },
                })
                    .then((response) => response.json())
                    .then((data) => {
                        // Kembalikan tombol seperti semula
                        filterButton.innerHTML = 'Terapkan';

                        // Kosongkan tabel sebelumnya
                        const tableBody = document.querySelector('#example tbody');
                        tableBody.innerHTML = '';

                        // Tambahkan data baru ke tabel dengan Class Tailwind Baru
                        data.forEach((rekap) => {
                            // Tentukan class badge status
                            const isJob = rekap.status === 'On Job';
                            const badgeColor = isJob ? 'bg-orange-50 text-orange-600 border-orange-100' : 'bg-green-50 text-green-600 border-green-100';
                            const dotColor = isJob ? 'bg-orange-500 animate-pulse' : 'bg-green-500';
                            const statusText = isJob ? 'Sedang Bertugas' : 'Tersedia';

                            const row = `
                                <tr class="border-b border-gray-50 hover:bg-slate-50/50 transition-colors duration-200">
                                    <td class="px-6 py-4 font-semibold text-slate-800 flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-cyan-100 text-cyan-600 flex items-center justify-center font-bold text-xs flex-shrink-0">
                                            ${rekap.name.substring(0, 1)}
                                        </div>
                                        ${rekap.name}
                                    </td>
                                    <td class="px-6 py-4 text-center font-medium">${rekap.total_service}</td>
                                    <td class="px-6 py-4 text-center font-medium">${rekap.monthly_service}</td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold border ${badgeColor}">
                                            <span class="w-1.5 h-1.5 rounded-full mr-2 ${dotColor}"></span>${statusText}
                                        </span>
                                    </td>
                                </tr>
                            `;
                            tableBody.insertAdjacentHTML('beforeend', row);
                        });
                    })
                    .catch((error) => {
                        console.error('Error fetching data:', error);
                        filterButton.innerHTML = 'Terapkan'; // Reset tombol bila error
                    });
            });
        });
    </script>
</x-app-layout>