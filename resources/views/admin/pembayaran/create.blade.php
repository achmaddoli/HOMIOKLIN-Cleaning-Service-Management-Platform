<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-cyan-100 text-cyan-600 rounded-xl flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
            </div>
            <h2 class="font-extrabold text-2xl text-slate-800 leading-tight">
                {{ __('Proses Pembayaran') }}
            </h2>
        </div>
    </x-slot>

    <div class="bg-slate-50 min-h-screen py-10 font-sans selection:bg-cyan-200 selection:text-cyan-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                <div class="lg:col-span-7 bg-white rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 overflow-hidden h-fit">
                    <div class="bg-slate-50/50 px-8 py-5 border-b border-gray-100 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                        <h3 class="text-lg font-bold text-slate-800">Ringkasan Pekerjaan Layanan</h3>
                    </div>
                    <div class="p-8 space-y-6">
                        @if ($report)
                            <div>
                                <p class="text-sm font-bold text-slate-500 mb-1">Kondisi Awal / Analisa</p>
                                <div class="bg-gray-50 p-4 rounded-xl border border-gray-100 text-slate-800 text-base leading-relaxed">
                                    {{ $report->initial_condition }}
                                </div>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-500 mb-1">Tindakan Kebersihan yang Diambil</p>
                                <div class="bg-cyan-50/50 p-4 rounded-xl border border-cyan-100 text-cyan-900 text-base leading-relaxed">
                                    {{ $report->cleaning_action }}
                                </div>
                            </div>

                            <div class="mt-8 border border-gray-100 rounded-2xl overflow-hidden">
                                <div class="bg-slate-50 px-6 py-3 border-b border-gray-100">
                                    <h4 class="font-bold text-slate-700">Rincian Biaya</h4>
                                </div>
                                <div class="p-6 space-y-4 bg-white">
                                    <div class="flex justify-between items-center text-slate-600">
                                        <p>Biaya Jasa Kebersihan</p>
                                        <p class="font-medium">Rp {{ number_format($report->service_cost, 0, ',', '.') }}</p>
                                    </div>
                                    <div class="flex justify-between items-center text-slate-600">
                                        <p>Biaya Tambahan / Alat / Cairan</p>
                                        <p class="font-medium">Rp {{ number_format($report->additional_cost, 0, ',', '.') }}</p>
                                    </div>
                                    <div class="pt-4 border-t border-dashed border-gray-200 flex justify-between items-center">
                                        <p class="text-lg font-bold text-slate-800">Total Tagihan</p>
                                        <p class="text-2xl font-extrabold text-cyan-600">Rp {{ number_format($report->total_cost, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-10">
                                <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                </div>
                                <p class="text-slate-500 font-medium">Laporan pekerjaan belum tersedia untuk booking ini.</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="lg:col-span-5 bg-white rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 overflow-hidden h-fit">
                    <div class="bg-slate-50/50 px-8 py-5 border-b border-gray-100 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" /></svg>
                        <h3 class="text-lg font-bold text-slate-800">Form Bayar</h3>
                    </div>

                    <div class="p-8">
                        <form action="{{ route('payment.store', $bookings->id) }}" method="POST" class="space-y-6">
                            @csrf

                            <div>
                                <label for="payment_type_id" class="block text-sm font-bold text-slate-700 mb-2">Metode Pembayaran</label>
                                <select name="payment_type_id" id="payment_type_id" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-800 cursor-pointer" required>
                                    <option value="">-- Pilih Metode --</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="amount" class="block text-sm font-bold text-slate-700 mb-2">Nominal Uang Diterima (Rp)</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none font-bold text-gray-400">
                                        Rp
                                    </div>
                                    <input type="number" name="amount" id="amount" class="block w-full pl-12 pr-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-800 font-bold text-lg" required>
                                </div>
                            </div>

                            <div class="pt-6 border-t border-gray-100 flex flex-col sm:flex-row gap-3">
                                <a href="{{ route('booking.index') }}" class="w-full text-center px-6 py-3.5 bg-white border border-gray-200 text-slate-600 font-bold rounded-xl hover:bg-gray-50 transition-colors">Batal</a>
                                <button type="submit" class="w-full flex items-center justify-center gap-2 px-6 py-3.5 bg-green-500 text-white font-bold rounded-xl hover:bg-green-600 hover:shadow-lg hover:shadow-green-500/30 transition-all duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                                    Proses
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @if (session('error'))
    <script>
        Swal.fire({
            icon: "warning",
            title: 'Error',
            text: '{{ session('error') }}',
            confirmButtonColor: '#06b6d4',
            borderRadius: '1rem'
        });
    </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                confirmButtonColor: '#06b6d4',
                borderRadius: '1rem'
            });
        </script>
    @endif
</x-app-layout>
