<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-orange-100 text-orange-500 rounded-xl flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
            </div>
            <h2 class="font-extrabold text-2xl text-slate-800 leading-tight">
                {{ __('Edit Laporan Pekerjaan') }}
            </h2>
        </div>
    </x-slot>

    <div class="bg-slate-50 min-h-screen py-10 font-sans selection:bg-cyan-200 selection:text-cyan-900">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 overflow-hidden">
                <div class="p-8 md:p-12">

                    <div class="mb-8 border-b border-gray-100 pb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div>
                            <h3 class="text-xl font-bold text-slate-800">Perbarui Detail Pekerjaan</h3>
                            <p class="text-slate-500 mt-1">Koreksi rincian tindakan atau perbarui estimasi biaya layanan.</p>
                        </div>
                        <div class="bg-orange-50 px-4 py-2.5 rounded-xl border border-orange-100 text-orange-700 font-bold flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" /></svg>
                            Booking: {{ $bookings->booking_number }}
                        </div>
                    </div>

                    <form action="{{ route('report.update', ['id' => $report->id, 'booking_id' => $bookings->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                            <div class="space-y-6">
                                <div>
                                    <label for="initial_condition" class="block text-sm font-bold text-slate-700 mb-2">Kondisi Awal / Analisa (Diagnosis)</label>
                                    <textarea name="initial_condition" id="initial_condition" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors resize-y text-slate-800" rows="4" required>{{ $report->initial_condition }}</textarea>
                                </div>

                                <div>
                                    <label for="cleaning_action" class="block text-sm font-bold text-slate-700 mb-2">Tindakan Kebersihan (Solusi)</label>
                                    <textarea name="cleaning_action" id="cleaning_action" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors resize-y text-slate-800" rows="4" required>{{ $report->cleaning_action }}</textarea>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <div>
                                    <label for="time_estimate" class="block text-sm font-bold text-slate-700 mb-2">Total Waktu Pengerjaan</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                        </div>
                                        <input type="text" name="time_estimate" id="time_estimate" value="{{ $report->time_estimate }}" class="block w-full pl-12 pr-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-800" required>
                                    </div>
                                </div>

                                <div>
                                    <label for="service_cost" class="block text-sm font-bold text-slate-700 mb-2">Biaya Jasa Kebersihan (Rp)</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none font-bold text-gray-400">Rp</div>
                                        <input type="number" name="service_cost" id="service_cost" value="{{ $report->service_cost }}" class="block w-full pl-12 pr-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-800 font-bold" required>
                                    </div>
                                </div>

                                <div>
                                    <label for="additional_cost" class="block text-sm font-bold text-slate-700 mb-2">Biaya Tambahan / Cairan Khusus (Rp)</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none font-bold text-gray-400">Rp</div>
                                        <input type="number" name="additional_cost" id="additional_cost" value="{{ $report->additional_cost }}" class="block w-full pl-12 pr-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors text-slate-800 font-bold" required>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="flex flex-col-reverse sm:flex-row items-center justify-end gap-4 pt-8 mt-4 border-t border-gray-100">
                            <a href="{{ route('teknisi.booking.index') }}" class="w-full sm:w-auto px-6 py-3.5 bg-white border border-gray-200 text-slate-600 font-bold rounded-xl hover:bg-gray-50 hover:text-slate-800 transition-colors text-center">
                                Batal & Kembali
                            </a>
                            <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-orange-500 text-white font-bold rounded-xl hover:bg-orange-600 hover:shadow-lg hover:shadow-orange-500/30 transition-all duration-300">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
