<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report Service') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id='recipients' class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mt-2">
                        <table id="example" class="stripe hover table-auto" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                            <thead>
                                <tr>
                                    <th data-priority="1">Id</th>
                                    <th data-priority="2">Booking</th>
                                    <th data-priority="3">Nama Teknisi</th>
                                    <th data-priority="4">Diagnosis</th>
                                    <th data-priority="5">Solusi</th>
                                    <th data-priority="6">Estimasi Waktu</th>
                                    <th data-priority="7">Tgl Proses</th>
                                    <th data-priority="8">Biaya Jasa</th>
                                    <th data-priority="9">Biaya Tambahan</th>
                                    <th data-priority="9">Total Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reports as $report)
                                <tr class="border-b">
                                    <td class="text-center">{{ $report->id }}</td>
                                    <td>{{ $report->booking->booking_number }}</td>
                                    <td>{{ $report->cleaner->name }}</td>
                                    <td class="w-52">{{ $report->initial_condition }}</td>
                                    <td class="w-52">{{ $report->cleaning_action }}</td>
                                    <td>{{ $report->time_estimate }}</td>
                                    <td class="w-52">{{ $report->process_date->format('d-m-Y') }}</td>
                                    <td>Rp{{ number_format($report->service_cost, 2) }}</td>
                                    <td>Rp{{ number_format($report->additional_cost, 2) }}</td>
                                    <td>Rp{{ number_format($report->total_cost, 2) }}</td>
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
