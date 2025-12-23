<x-app-layout>
    <div class="py-12 bg-gradient-to-br from-slate-50 to-teal-50 min-h-screen">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-8">
            <a href="{{ route('customer.booking.index') }}" class="inline-flex items-center text-teal-600 hover:text-teal-700 font-semibold mb-6 transition-all duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Kembali ke Daftar GOR
            </a>
        </div>
        <div class="bg-white/90 backdrop-blur-xl shadow-2xl rounded-3xl border border-white/50 p-8">
            <h2 class="text-2xl font-bold text-teal-700 mb-6">Booking di {{ $gor->nama }}</h2>
            <div class="mb-6">
                <label for="field_id" class="block font-semibold text-gray-700 mb-2">Pilih Lapangan</label>
                <select id="field_id" name="field_id" class="w-full border-2 border-teal-200 rounded-xl p-3 focus:border-teal-500" required>
                    @foreach($fields as $field)
                        <option value="{{ $field->id }}" data-harga="{{ $field->harga_per_jam }}" @if($loop->first) selected @endif>{{ $field->nama }} ({{ $field->jenis }})</option>
                    @endforeach
                </select>
            </div>
            <div id="dynamicBookingForm">
                @php
                    $firstField = $fields->first();
                @endphp
                @if($firstField)
                    @include('booking.create', ['field' => $firstField])
                @endif
            </div>
        </div>
    </div>
</div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fieldSelect = document.getElementById('field_id');
            const dynamicForm = document.getElementById('dynamicBookingForm');
            fieldSelect.addEventListener('change', function() {
                const fieldId = this.value;
                if (!fieldId) {
                    dynamicForm.innerHTML = '';
                    return;
                }
                dynamicForm.innerHTML = '<div class="text-center py-8 text-teal-500 font-bold animate-pulse">Memuat jadwal & harga...</div>';
                fetch(`/booking/field/${fieldId}/create`)
                    .then(res => res.text())
                    .then(html => {
                        // Ambil hanya isi booking tanpa layout
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        const mainForm = doc.querySelector('#mainBookingForm');
                        if (mainForm) {
                            dynamicForm.innerHTML = mainForm.innerHTML;
                            // Eksekusi ulang semua <script> di hasil AJAX agar jadwal muncul
                            const scripts = mainForm.querySelectorAll('script');
                            scripts.forEach(oldScript => {
                                const newScript = document.createElement('script');
                                if (oldScript.src) {
                                    newScript.src = oldScript.src;
                                } else {
                                    newScript.textContent = oldScript.textContent;
                                }
                                document.body.appendChild(newScript);
                            });
                        } else {
                            dynamicForm.innerHTML = '<div class="text-red-500">Gagal memuat form booking.</div>';
                        }
                    });
            });
        });
    </script>
</x-app-layout>
