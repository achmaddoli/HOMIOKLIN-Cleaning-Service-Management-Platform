<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Booking') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id='recipients' class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mt-0">
                        <div class="text-lg font-semibold">
                            <h3>Informasi Booking</h3>
                        </div>
                        <div class="md:flex justify-start items-start mt-8">
                            <div class="md:w-2/5">
                                <p class="mb-2">No Booking</p>
                                <div class="p-3 rounded-md bg-slate-100 w-96">
                                    <p>{{ $booking->booking_number }}</p>
                                </div>
                                <p class="mb-2 mt-3">Nama</p>
                                <div class="p-3 rounded-md bg-slate-100 w-96">
                                    <p>{{ $booking->customer->name }}</p>
                                </div>
                                <p class="mb-2 mt-3">Kategori</p>
                                <div class="p-3 rounded-md bg-slate-100 w-96">
                                    <p>{{ $booking->category->name }}</p>
                                </div>
                                <p class="mb-2 mt-3">Merk Laptop</p>
                                <div class="p-3 rounded-md bg-slate-100 w-96">
                                    <p>{{ $booking->property_type }}</p>
                                </div>
                            </div>
                            <div class="md:w-3/5">
                                <p class="mb-2">Tipe Laptop</p>
                                <div class="p-3 rounded-md bg-slate-100 w-[30rem]">
                                    <p>{{ $booking->room_area }}</p>
                                </div>
                                <p class="mb-2 mt-3">Deskripsi</p>
                                <div class="p-3 rounded-md bg-slate-100 w-[30rem]">
                                    <p>{{ $booking->room_condition }}</p>
                                </div>
                                <p class="mb-2 mt-3">Tanggal Booking</p>
                                <div class="p-3 rounded-md bg-slate-100 w-[30rem]">
                                    <p>{{ $booking->booking_date->format('d-m-Y') }}</p>
                                </div>
                                <p class="mb-2 mt-3">Catatan</p>
                                <div class="p-3 rounded-md bg-slate-100 w-[30rem]">
                                    <p>{{ $booking->notes }}</p>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5">
                            <p class="mb-3 font-semibold">Status</p>
                            @if ($booking->status == 'Menunggu')
                                <td class="text-center text-sm"><span class="p-2 bg-slate-500 rounded-md text-white font-semibold">{{ $booking->status }}</span></td>
                            @elseif ($booking->status == 'Ditolak')
                                <td class="text-center text-sm"><span class="p-2 bg-red-500 rounded-md text-white font-semibold">{{ $booking->status }}</span></td>
                            @elseif ($booking->status == 'Diterima')
                                <td class="text-center text-sm"><span class="p-2 bg-lime-500 rounded-md text-white font-semibold">{{ $booking->status }}</span></td>
                            @elseif ($booking->status == 'Diproses')
                                <td class="text-center text-sm"><span class="p-2 bg-orange-500 rounded-md text-white font-semibold">{{ $booking->status }}</span></td>
                            @elseif ($booking->status == 'Selesai')
                                <td class="text-center text-sm"><span class="p-2 bg-green-500 rounded-md text-white font-semibold">{{ $booking->status }}</span></td>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
            <div id='recipients' class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mt-0">
                        <div class="text-lg font-semibold">
                            <h3>Gambar</h3>
                        </div>
                        <div class="mt-8 md:grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @if($booking->images->isNotEmpty())
                                @foreach ($booking->images as $image)
                                    <img src="{{ asset('images/' . $image->image) }}" alt="Booking Image" class="rounded-md w-80 h-52 object-cover my-4 md:my-0">
                                @endforeach
                            @else
                                <p>No images uploaded.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
            <div id='recipients' class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mt-0">
                        <div class="text-lg font-semibold mb-8">
                            <h3>Laporan Service</h3>
                        </div>
                        @if($booking->serviceReport)
                            <p class="mb-2 mt-3">Diagnosis</p>
                            <div class="p-3 rounded-md bg-slate-100 w-[30rem] lg:w-[50rem]">
                                <p>{{ $booking->serviceReport->diagnosis }}</p>
                            </div>
                            <p class="mb-2 mt-3">Tindakan yang Diambil</p>
                            <div class="p-3 rounded-md bg-slate-100 w-[30rem] lg:w-[50rem]">
                                <p>{{ $booking->serviceReport->action_taken }}</p>
                            </div>
                            <p class="mb-2 mt-3">Estimasi Waktu</p>
                            <div class="p-3 rounded-md bg-slate-100 w-[30rem]">
                                <p>{{ $booking->serviceReport->time_estimate }}</p>
                            </div>
                            <p class="mb-2 mt-3">Biaya Service</p>
                            <div class="p-3 rounded-md bg-slate-100 w-[30rem]">
                                <p>Rp {{ $booking->serviceReport->service_cost }}</p>
                            </div>
                            <p class="mb-2 mt-3">Biaya Spare Part</p>
                            <div class="p-3 rounded-md bg-slate-100 w-[30rem]">
                                <p>Rp {{ $booking->serviceReport->parts_cost }}</p>
                            </div>
                            <p class="mb-2 mt-3">Biaya Total</p>
                            <div class="p-3 rounded-md bg-slate-100 w-[30rem]">
                                <p>Rp {{ $booking->serviceReport->total_cost }}</p>
                            </div>
                        @else
                            <p>Service belum diproses.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
