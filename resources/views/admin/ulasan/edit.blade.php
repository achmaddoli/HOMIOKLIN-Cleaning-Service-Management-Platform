<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-orange-100 text-orange-500 rounded-xl flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
            </div>
            <h2 class="font-extrabold text-2xl text-slate-800 leading-tight">
                {{ __('Edit Testimoni') }}
            </h2>
        </div>
    </x-slot>

    <div class="bg-slate-50 min-h-screen py-10 font-sans selection:bg-cyan-200 selection:text-cyan-900">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 overflow-hidden">
                <div class="p-8 md:p-12">
                    
                    <div class="mb-8 border-b border-gray-100 pb-6 text-center">
                        <h3 class="text-2xl font-bold text-slate-800">Perbarui Ulasan Anda</h3>
                        <p class="text-slate-500 mt-2">Sesuaikan kembali rating atau deskripsi pengalaman Anda.</p>
                    </div>

                    @if (Auth::user()->role_id == '1')
                    <form action="{{ route('admin.testimonial.update', $testimonial->id) }}" method="POST" class="space-y-6">
                    @else
                    <form action="{{ route('testimonial.update', ['id' => $testimonial->id, 'booking_id' => $bookings->id]) }}" method="POST" class="space-y-6">
                    @endif
                        @csrf
                        @method('PUT')
                        
                        <div>
                            <label for="rating" class="block text-sm font-bold text-slate-700 mb-2">Penilaian Anda (Bintang)</label>
                            <select name="rating" id="rating" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 transition-colors text-slate-800 font-medium cursor-pointer text-lg" required>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ (old('rating') == $i || (isset($testimonial) && $testimonial->rating == $i)) ? 'selected' : '' }}>
                                        {{ str_repeat('★', $i) }} {{ str_repeat('☆', 5 - $i) }} ({{ $i }}/5)
                                    </option>
                                @endfor
                            </select>
                        </div>
                        
                        <div>
                            <label for="description" class="block text-sm font-bold text-slate-700 mb-2">Ulasan Lengkap</label>
                            <textarea name="description" id="description" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors resize-y text-slate-800" rows="5">{{ $testimonial->description }}</textarea>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row items-center justify-end gap-4 pt-6 mt-4">
                            @if (Auth::user()->role_id == '1')
                                <a href="{{ route('admin.testimonial.index') }}" class="w-full sm:w-auto px-6 py-3.5 bg-white border border-gray-200 text-slate-600 font-bold rounded-xl hover:bg-gray-50 hover:text-slate-800 transition-colors text-center">Batal & Kembali</a>
                            @else
                                <a href="{{ route('user.booking.show', $bookings->id) }}" class="w-full sm:w-auto px-6 py-3.5 bg-white border border-gray-200 text-slate-600 font-bold rounded-xl hover:bg-gray-50 hover:text-slate-800 transition-colors text-center">Batal & Kembali</a>
                            @endif
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