<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-cyan-100 text-cyan-600 rounded-xl flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
            </div>
            <h2 class="font-extrabold text-2xl text-slate-800 leading-tight">
                {{ __('Riwayat Pembayaran') }}
            </h2>
        </div>
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
        table.dataTable { width: 100% !important; min-width: 1100px; }
    </style>

    <div class="bg-slate-50 min-h-screen py-10 font-sans selection:bg-cyan-200 selection:text-cyan-900">
        <div class="max-w-[90rem] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 overflow-hidden">
                <div class="p-6 md:p-8">
                    <div>
                        <table id="example" class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wider border-b border-gray-100">
                                    <th class="px-4 py-4 font-bold rounded-tl-xl text-center" data-priority="1">No. Booking</th>
                                    <th class="px-4 py-4 font-bold" data-priority="2">Pelanggan</th>
                                    <th class="px-4 py-4 font-bold" data-priority="3">Kondisi Awal</th>
                                    <th class="px-4 py-4 font-bold" data-priority="4">Tindakan Kebersihan</th>
                                    <th class="px-4 py-4 font-bold text-center" data-priority="5">Tgl Selesai</th>
                                    <th class="px-4 py-4 font-bold text-center" data-priority="6">Metode</th>
                                    <th class="px-4 py-4 font-bold text-right" data-priority="7">Total Biaya</th>
                                    <th class="px-4 py-4 font-bold text-center" data-priority="8">Tgl Bayar</th>
                                    <th class="px-4 py-4 font-bold text-center rounded-tr-xl" data-priority="9">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-slate-700 text-sm">
                                @foreach ($payments as $payment)
                                <tr class="border-b border-gray-50 hover:bg-slate-50/50 transition-colors duration-200 align-middle">
                                    <td class="px-4 py-4 text-center font-mono font-bold text-slate-600">#{{ $payment->booking->booking_number }}</td>
                                    <td class="px-4 py-4 font-bold text-slate-800 whitespace-nowrap">{{ $payment->booking->customer->name }}</td>
                                    <td class="px-4 py-4 text-slate-600 min-w-[120px] truncate max-w-[180px]" title="{{ $payment->booking->cleaningReport->initial_condition }}">{{ $payment->booking->cleaningReport->initial_condition }}</td>
                                    <td class="px-4 py-4 text-slate-600 min-w-[120px] truncate max-w-[180px]" title="{{ $payment->booking->cleaningReport->cleaning_action }}">{{ $payment->booking->cleaningReport->cleaning_action }}</td>
                                    <td class="px-4 py-4 text-center font-medium">{{ $payment->booking->cleaningReport->completion_date->format('d-m-Y') }}</td>
                                    <td class="px-4 py-4 text-center">
                                        <span class="bg-gray-100 text-slate-600 px-3 py-1 rounded-lg text-xs font-bold">{{ $payment->paymentType->name }}</span>
                                    </td>
                                    <td class="px-4 py-4 text-right font-extrabold text-cyan-600">Rp {{ number_format($payment->booking->cleaningReport->total_cost, 0, ',', '.') }}</td>
                                    <td class="px-4 py-4 text-center font-medium text-slate-500">{{ $payment->payment_date->format('d-m-Y') }}</td>
                                    <td class="px-4 py-4 text-center">
                                        <div class="flex justify-center items-center gap-2">
                                            <a href="{{ route('payment.edit', ['id' => $payment->id, 'booking_id' => $payment->booking_id]) }}" class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-orange-50 text-orange-500 hover:bg-orange-500 hover:text-white transition-colors duration-200 tooltip" title="Edit Transaksi">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
                                            </a>
                                        </div>
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
</x-app-layout>
