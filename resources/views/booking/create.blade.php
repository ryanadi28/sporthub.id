<x-app-layout>
    <x-slot name="header">
        <!-- Animated Header -->
        <div class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-teal-900 to-slate-900 py-8 px-6 rounded-2xl shadow-2xl">
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute w-96 h-96 -top-48 -left-48 bg-teal-500/20 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute w-96 h-96 -bottom-48 -right-48 bg-teal-400/20 rounded-full blur-3xl animate-pulse delay-700"></div>
            </div>

            <div class="relative flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-lg transform hover:scale-110 transition-all duration-300">
                        <svg class="w-10 h-10 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-bold text-3xl text-white leading-tight tracking-tight animate-fade-in-down">
                            Booking: {{ $field->nama }}
                        </h2>
                        <p class="text-teal-300 text-sm mt-1 font-medium animate-fade-in-up">
                            sporthub<span class="text-white">.id</span> - Reservasi Lapangan
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 to-teal-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <!-- Back Button -->
            <a href="{{ route('customer.booking.field', $field) }}" class="group inline-flex items-center space-x-2 text-teal-600 hover:text-teal-700 font-semibold mb-6 transition-all duration-300 transform hover:scale-105">
                <div class="w-8 h-8 bg-teal-100 rounded-xl flex items-center justify-center group-hover:bg-teal-200 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </div>
                <span>Kembali</span>
            </a>

            <!-- Field Info Card -->
            <div class="bg-gradient-to-br from-teal-500 to-emerald-600 overflow-hidden shadow-2xl rounded-3xl p-6 mb-6 animate-fade-in-up transform hover:scale-[1.01] transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center shadow-lg">
                            <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-white">{{ $field->nama }}</p>
                            <p class="text-teal-100 font-medium">{{ $field->gor->nama }}</p>
                        </div>
                    </div>
                    <div class="bg-white/20 backdrop-blur-md px-6 py-4 rounded-2xl border-2 border-white/30">
                        <p class="text-xs text-teal-100 font-semibold uppercase tracking-wider">Harga</p>
                        <p class="text-3xl font-bold text-white">Rp {{ number_format($field->harga_per_jam, 0, ',', '.') }}</p>
                        <p class="text-sm text-teal-100">/jam</p>
                    </div>
                </div>
            </div>

            <!-- Main Booking Form -->
            <div class="bg-white/90 backdrop-blur-xl overflow-hidden shadow-2xl rounded-3xl border border-white/50 p-8 animate-fade-in-up" style="animation-delay: 100ms">
                <form method="POST" action="{{ route('customer.booking.store', $field) }}" enctype="multipart/form-data" id="bookingForm">
                    @csrf

                    <div class="grid lg:grid-cols-2 gap-8">
                        {{-- Calendar Section --}}
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="w-10 h-10 bg-gradient-to-br from-teal-500 to-teal-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <label class="text-xl font-bold text-gray-800">Pilih Tanggal</label>
                            </div>

                            <div class="bg-gradient-to-br from-slate-50 to-teal-50 rounded-2xl p-6 border-2 border-teal-100 shadow-lg" id="calendar">
                                <div class="flex justify-between items-center mb-6">
                                    <button type="button" id="prevMonth" class="w-10 h-10 flex items-center justify-center bg-white hover:bg-teal-100 text-teal-600 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-110">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                    </button>
                                    <span id="monthYear" class="font-bold text-xl text-teal-700"></span>
                                    <button type="button" id="nextMonth" class="w-10 h-10 flex items-center justify-center bg-white hover:bg-teal-100 text-teal-600 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:scale-110">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </button>
                                </div>

                                <div class="grid grid-cols-7 gap-2 text-center text-xs font-bold text-gray-600 mb-3">
                                    <div class="py-2">Min</div>
                                    <div class="py-2">Sen</div>
                                    <div class="py-2">Sel</div>
                                    <div class="py-2">Rab</div>
                                    <div class="py-2">Kam</div>
                                    <div class="py-2">Jum</div>
                                    <div class="py-2">Sab</div>
                                </div>

                                <div id="calendarDays" class="grid grid-cols-7 gap-2"></div>
                            </div>

                            <input type="hidden" name="tanggal" id="tanggalInput" value="{{ old('tanggal', now()->format('Y-m-d')) }}" required />
                            @error('tanggal')
                                <div class="flex items-center space-x-2 bg-red-50 border border-red-200 rounded-xl p-3 mt-2">
                                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="text-red-600 text-sm font-semibold">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>

                        {{-- Time Slots Section --}}
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3 mb-4">
                                <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <label class="text-xl font-bold text-gray-800">Pilih Jam</label>
                            </div>

                            <div id="timeSlotsContainer" class="bg-gradient-to-br from-slate-50 to-indigo-50 rounded-2xl p-6 border-2 border-indigo-100 shadow-lg min-h-[300px]">
                                <div class="flex flex-col items-center justify-center h-full py-12">
                                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4">
                                        <svg class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-gray-400 text-center font-medium">Pilih tanggal terlebih dahulu</p>
                                </div>
                            </div>

                            <input type="hidden" name="jam_mulai" id="jamMulaiInput" required />
                            <input type="hidden" name="jam_selesai" id="jamSelesaiInput" required />
                            @error('jam_mulai')
                                <div class="flex items-center space-x-2 bg-red-50 border border-red-200 rounded-xl p-3 mt-2">
                                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="text-red-600 text-sm font-semibold">{{ $message }}</p>
                                </div>
                            @enderror
                            @error('jam_selesai')
                                <div class="flex items-center space-x-2 bg-red-50 border border-red-200 rounded-xl p-3 mt-2">
                                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="text-red-600 text-sm font-semibold">{{ $message }}</p>
                                </div>
                            @enderror

                            <!-- Selected Time Info -->
                            <div id="selectedTimeInfo" class="hidden bg-gradient-to-br from-teal-50 to-emerald-50 border-2 border-teal-200 rounded-2xl p-5 shadow-lg animate-fade-in-up">
                                <div class="flex items-center space-x-2 mb-3">
                                    <div class="w-8 h-8 bg-teal-500 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="font-bold text-teal-700">Detail Booking</p>
                                </div>
                                <div class="space-y-2">
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-600 font-medium">Waktu</span>
                                        <span class="text-sm font-bold text-gray-900" id="selectedTimeText"></span>
                                    </div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-sm text-gray-600 font-medium">Durasi</span>
                                        <span class="text-sm font-bold text-gray-900" id="durationText"></span>
                                    </div>
                                    <div class="h-px bg-gradient-to-r from-transparent via-teal-300 to-transparent my-2"></div>
                                    <div class="flex justify-between items-center">
                                        <span class="text-base text-gray-700 font-bold">Total Bayar</span>
                                        <span class="text-2xl font-bold text-green-600">Rp <span id="totalPrice"></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Form Fields -->
                    <div class="mt-8 space-y-6">
                        <!-- Catatan -->
                        <div>
                            <div class="flex items-center space-x-3 mb-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </div>
                                <label class="text-lg font-bold text-gray-800">Catatan <span class="text-sm text-gray-500 font-normal">(opsional)</span></label>
                            </div>
                            <textarea name="catatan" rows="3" class="w-full border-2 border-gray-200 rounded-2xl shadow-sm focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition-all duration-300 p-4" placeholder="Tambahkan catatan khusus untuk booking Anda...">{{ old('catatan') }}</textarea>
                        </div>

                        <!-- Bukti Transfer -->
                        <div>
                            <div class="flex items-center space-x-3 mb-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <label class="text-lg font-bold text-gray-800">Bukti Transfer <span class="text-red-500">*</span></label>
                            </div>
                            <div class="bg-blue-50 border-2 border-blue-200 rounded-2xl p-4">
                                <p class="text-sm text-blue-700 mb-3 font-medium">📸 Upload bukti transfer pembayaran (JPG/PNG, max 2MB)</p>
                                <input type="file" name="bukti_transfer" accept="image/*" class="block w-full text-sm text-gray-700 file:mr-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:font-semibold file:bg-teal-500 file:text-white hover:file:bg-teal-600 file:transition-all file:duration-300 file:cursor-pointer" required />
                            </div>
                            @error('bukti_transfer')
                                <div class="flex items-center space-x-2 bg-red-50 border border-red-200 rounded-xl p-3 mt-2">
                                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="text-red-600 text-sm font-semibold">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>

                        <!-- Warning Notice -->
                        <div class="bg-gradient-to-r from-yellow-50 to-amber-50 border-2 border-yellow-200 rounded-2xl p-5 shadow-lg">
                            <div class="flex items-start space-x-3">
                                <div class="w-10 h-10 bg-yellow-400 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-yellow-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold text-yellow-900 mb-1">Penting!</p>
                                    <p class="text-sm text-yellow-800">Booking Anda akan diproses setelah bukti transfer diverifikasi oleh Admin GOR. Harap menunggu konfirmasi melalui email atau notifikasi.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-8 pt-6 border-t-2 border-gray-100">
                        <a href="{{ route('customer.booking.field', $field) }}" class="group inline-flex items-center space-x-2 text-gray-600 hover:text-gray-800 font-semibold transition-all duration-300">
                            <svg class="w-5 h-5 transform group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            <span>Batal</span>
                        </a>

                        <button type="submit" id="submitBtn" class="group relative inline-flex items-center justify-center space-x-3 bg-gradient-to-r from-teal-500 to-emerald-600 text-white px-8 py-4 rounded-2xl font-bold text-lg shadow-2xl hover:shadow-teal-500/50 transform hover:scale-105 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100" disabled>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Kirim Booking</span>
                            <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fieldId = {{ $field->id }};
            const pricePerHour = {{ $field->harga_per_jam }};
            const schedules = @json($field->schedules);

            let currentDate = new Date();
            let selectedDate = null;
            let selectedStartSlot = null;
            let selectedEndSlot = null;
            let bookedSlots = {};

            // Calendar
            function renderCalendar() {
                const year = currentDate.getFullYear();
                const month = currentDate.getMonth();
                const monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                document.getElementById('monthYear').textContent = `${monthNames[month]} ${year}`;

                const firstDay = new Date(year, month, 1).getDay();
                const daysInMonth = new Date(year, month + 1, 0).getDate();
                const today = new Date();
                today.setHours(0, 0, 0, 0);

                let html = '';

                // Empty cells for days before first day of month
                for (let i = 0; i < firstDay; i++) {
                    html += '<div class="p-2"></div>';
                }

                // Days of month
                for (let day = 1; day <= daysInMonth; day++) {
                    const date = new Date(year, month, day);
                    const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                    const isPast = date < today;
                    const isSelected = selectedDate === dateStr;
                    const isToday = date.getTime() === today.getTime();

                    let classes = 'p-3 text-center rounded-xl cursor-pointer text-sm font-semibold transition-all duration-300 ';

                    if (isPast) {
                        classes += 'text-gray-300 cursor-not-allowed bg-gray-50';
                    } else if (isSelected) {
                        classes += 'bg-gradient-to-br from-teal-500 to-teal-600 text-white shadow-lg transform scale-110';
                    } else if (isToday) {
                        classes += 'bg-teal-100 text-teal-700 hover:bg-teal-200 border-2 border-teal-400 transform hover:scale-105';
                    } else {
                        classes += 'bg-white hover:bg-teal-50 text-gray-700 hover:text-teal-700 shadow-sm hover:shadow-md transform hover:scale-105';
                    }

                    html += `<div class="${classes}" data-date="${dateStr}">${day}</div>`;
                }

                document.getElementById('calendarDays').innerHTML = html;

                // Add click events to calendar days
                document.querySelectorAll('#calendarDays > div[data-date]').forEach(el => {
                    const dateStr = el.getAttribute('data-date');
                    const date = new Date(dateStr);
                    const today = new Date();
                    today.setHours(0, 0, 0, 0);

                    if (date >= today) {
                        el.addEventListener('click', () => selectDateHandler(dateStr));
                    }
                });
            }

            document.getElementById('prevMonth').addEventListener('click', () => {
                currentDate.setMonth(currentDate.getMonth() - 1);
                renderCalendar();
            });

            document.getElementById('nextMonth').addEventListener('click', () => {
                currentDate.setMonth(currentDate.getMonth() + 1);
                renderCalendar();
            });

            function selectDateHandler(dateStr) {
                selectedDate = dateStr;
                document.getElementById('tanggalInput').value = dateStr;
                selectedStartSlot = null;
                selectedEndSlot = null;
                renderCalendar();
                loadTimeSlots(dateStr);
            }

            async function loadTimeSlots(dateStr) {
                const container = document.getElementById('timeSlotsContainer');
                container.innerHTML = '<div class="flex flex-col items-center justify-center h-full py-12"><div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mb-4 animate-pulse"><svg class="w-8 h-8 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div><p class="text-gray-400 text-center font-medium">Memuat jadwal...</p></div>';

                try {
                    const response = await fetch(`/api/fields/${fieldId}/availability?tanggal=${dateStr}`);
                    const data = await response.json();
                    bookedSlots = {};

                    // Mark booked slots
                    if (data.bookings && data.bookings.length > 0) {
                        data.bookings.forEach(b => {
                            const startHour = parseInt(b.jam_mulai.split(':')[0]);
                            const endHour = parseInt(b.jam_selesai.split(':')[0]);

                            for (let h = startHour; h < endHour; h++) {
                                bookedSlots[`${String(h).padStart(2, '0')}:00`] = true;
                            }
                        });
                    }

                    renderTimeSlots(data.schedule);
                } catch (e) {
                    console.error(e);
                    container.innerHTML = '<div class="flex flex-col items-center justify-center h-full py-12"><div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4"><svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div><p class="text-red-500 text-center font-semibold">Gagal memuat jadwal</p></div>';
                }
            }

            function renderTimeSlots(schedule) {
                const container = document.getElementById('timeSlotsContainer');

                if (!schedule || !schedule.is_available) {
                    container.innerHTML = '<div class="flex flex-col items-center justify-center h-full py-12"><div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4"><svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></div><p class="text-red-500 text-center font-semibold">Lapangan tidak tersedia di hari ini</p></div>';
                    return;
                }

                const startHour = parseInt(schedule.jam_buka.split(':')[0]);
                const endHour = parseInt(schedule.jam_tutup.split(':')[0]);

                // Check if selected date is today
                const now = new Date();
                const todayStr = `${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}-${String(now.getDate()).padStart(2, '0')}`;
                const isToday = selectedDate === todayStr;
                const currentHour = now.getHours();
                const currentMinute = now.getMinutes();

                let html = '<div class="grid grid-cols-3 sm:grid-cols-4 gap-3">';

                for (let h = startHour; h < endHour; h++) {
                    const timeStr = `${String(h).padStart(2, '0')}:00`;
                    const isBooked = bookedSlots[timeStr];
                    const isSelected = isSlotInRange(timeStr);

                    // Check if time has passed (for today only)
                    const isPast = isToday && h <= currentHour;

                    let classes = 'p-3 text-center rounded-xl text-sm font-bold time-slot transition-all duration-300 transform ';

                    if (isBooked || isPast) {
                        classes += 'bg-gradient-to-br from-red-100 to-rose-100 text-red-400 cursor-not-allowed line-through border-2 border-red-200';
                    } else if (isSelected) {
                        classes += 'bg-gradient-to-br from-teal-500 to-emerald-500 text-white shadow-lg scale-105 border-2 border-teal-600';
                    } else {
                        classes += 'bg-white hover:bg-gradient-to-br hover:from-teal-100 hover:to-emerald-100 cursor-pointer shadow-md hover:shadow-lg border-2 border-gray-200 hover:border-teal-400 text-gray-700 hover:text-teal-700 hover:scale-105';
                    }

                    const unavailable = isBooked || isPast ? '1' : '0';
                    html += `<div class="${classes}" data-time="${timeStr}" data-booked="${unavailable}">${timeStr}</div>`;
                }

                html += '</div>';
                html += '<div class="mt-5 space-y-2"><div class="flex items-center space-x-2 text-xs text-gray-600"><svg class="w-4 h-4 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg><span>Klik slot pertama untuk jam mulai, lalu klik slot kedua untuk jam selesai</span></div><div class="flex items-center space-x-2 text-xs text-red-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg><span>Merah = sudah dibooking / jam sudah lewat</span></div></div>';

                container.innerHTML = html;

                // Add click events to time slots
                container.querySelectorAll('.time-slot').forEach(el => {
                    if (el.getAttribute('data-booked') === '0') {
                        el.addEventListener('click', () => selectTimeSlotHandler(el.getAttribute('data-time')));
                    }
                });
            }

            function isSlotInRange(timeStr) {
                if (!selectedStartSlot || !selectedEndSlot) {
                    return timeStr === selectedStartSlot;
                }
                return timeStr >= selectedStartSlot && timeStr < selectedEndSlot;
            }

            function selectTimeSlotHandler(timeStr) {
                if (!selectedStartSlot) {
                    selectedStartSlot = timeStr;
                    selectedEndSlot = null;
                } else if (!selectedEndSlot) {
                    if (timeStr <= selectedStartSlot) {
                        selectedStartSlot = timeStr;
                    } else {
                        // Check if any slot in range is booked (tidak termasuk jam selesai)
                        let hasBookedInRange = false;
                        const startH = parseInt(selectedStartSlot.split(':')[0]);
                        const endH = parseInt(timeStr.split(':')[0]);

                        for (let h = startH; h < endH; h++) {
                            const t = `${String(h).padStart(2, '0')}:00`;
                            if (bookedSlots[t]) {
                                hasBookedInRange = true;
                                break;
                            }
                        }

                        if (hasBookedInRange) {
                            alert('Tidak bisa booking melewati slot yang sudah dibooking!');
                            return;
                        }

                        // Use clicked slot directly as end time
                        selectedEndSlot = timeStr;
                    }
                } else {
                    selectedStartSlot = timeStr;
                    selectedEndSlot = null;
                }

                updateSelection();
                renderTimeSlots({ jam_buka: schedules[0]?.jam_buka || '08:00', jam_tutup: schedules[0]?.jam_tutup || '22:00', is_available: true });
            }

            function updateSelection() {
                document.getElementById('jamMulaiInput').value = selectedStartSlot || '';
                document.getElementById('jamSelesaiInput').value = selectedEndSlot || '';

                const infoDiv = document.getElementById('selectedTimeInfo');
                const submitBtn = document.getElementById('submitBtn');

                if (selectedStartSlot && selectedEndSlot) {
                    const startH = parseInt(selectedStartSlot.split(':')[0]);
                    const startM = parseInt(selectedStartSlot.split(':')[1]);
                    const endH = parseInt(selectedEndSlot.split(':')[0]);
                    const endM = parseInt(selectedEndSlot.split(':')[1]);

                    const durationMinutes = (endH * 60 + endM) - (startH * 60 + startM);
                    const durationHours = durationMinutes / 60;
                    const total = durationHours * pricePerHour;

                    document.getElementById('selectedTimeText').textContent = `${selectedStartSlot} - ${selectedEndSlot}`;
                    document.getElementById('durationText').textContent = `${durationMinutes} menit (${durationHours} jam)`;
                    document.getElementById('totalPrice').textContent = new Intl.NumberFormat('id-ID').format(total);

                    infoDiv.classList.remove('hidden');
                    submitBtn.disabled = false;
                } else {
                    infoDiv.classList.add('hidden');
                    submitBtn.disabled = true;
                }
            }

            // Init
            renderCalendar();
        });
    </script>
    @endpush

    <!-- Custom Animations CSS -->
    <style>
        @keyframes fade-in-down {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in-down { animation: fade-in-down 0.6s ease-out; }
        .animate-fade-in-up { animation: fade-in-up 0.6s ease-out; }
        .delay-700 { animation-delay: 0.7s; }
    </style>
</x-app-layout>
