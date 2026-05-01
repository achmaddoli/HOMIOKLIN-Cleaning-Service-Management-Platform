<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-cyan-100 text-cyan-600 rounded-xl flex items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
            </div>
            <h2 class="font-extrabold text-2xl text-slate-800 leading-tight">
                {{ __('Beri Testimoni') }}
            </h2>
        </div>
    </x-slot>

    <div class="bg-slate-50 min-h-screen py-10 font-sans selection:bg-cyan-200 selection:text-cyan-900">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-gray-100 overflow-hidden">
                <div class="p-8 md:p-12">
                    
                    <div class="mb-8 border-b border-gray-100 pb-6 text-center">
                        <div class="w-16 h-16 bg-yellow-50 text-yellow-500 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-800">Bagaimana Pelayanan Kami?</h3>
                        <p class="text-slate-500 mt-2">Beri tahu kami pengalaman Anda setelah menggunakan layanan kebersihan HOMIOKLIN.</p>
                    </div>

                    <form action="{{ route('testimonial.store', $bookings->id) }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div>
                            <label for="rating" class="block text-sm font-bold text-slate-700 mb-2">Penilaian Anda (Bintang)</label>
                            <select name="rating" id="rating" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 transition-colors text-slate-800 font-medium cursor-pointer text-lg" required>
                                <option value="">-- Pilih Rating --</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ (old('rating') == $i || (isset($testimonial) && $testimonial->rating == $i)) ? 'selected' : '' }}>
                                        {{ str_repeat('★', $i) }} {{ str_repeat('☆', 5 - $i) }} ({{ $i }}/5)
                                    </option>
                                @endfor
                            </select>
                        </div>
                        
                        <div>
                            <label for="description" class="block text-sm font-bold text-slate-700 mb-2">Ulasan Lengkap</label>
                            <textarea name="description" id="description" class="block w-full px-4 py-3.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 transition-colors resize-y text-slate-800" rows="5" placeholder="Ceritakan kepuasan atau masukan Anda terkait layanan ini..."></textarea>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row items-center justify-end gap-4 pt-6 mt-4">
                            <a href="{{ route('user.booking.show', $bookings->id) }}" class="w-full sm:w-auto px-6 py-3.5 bg-white border border-gray-200 text-slate-600 font-bold rounded-xl hover:bg-gray-50 hover:text-slate-800 transition-colors text-center">
                                Batal & Kembali
                            </a>
                            <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-cyan-500 text-white font-bold rounded-xl hover:bg-cyan-600 hover:shadow-lg hover:shadow-cyan-500/30 transition-all duration-300">
                                Kirim Ulasan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>