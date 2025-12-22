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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-bold text-3xl text-white leading-tight tracking-tight animate-fade-in-down">
                            {{ $field->nama }}
                        </h2>
                        <p class="text-teal-300 text-sm mt-1 font-medium animate-fade-in-up">
                            {{ $field->gor->nama }} - sporthub<span class="text-white">.id</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 to-teal-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <!-- Back Button -->
            <a href="{{ route('customer.booking.index') }}" class="group inline-flex items-center space-x-2 text-teal-600 hover:text-teal-700 font-semibold mb-6 transition-all duration-300 transform hover:scale-105">
                <div class="w-8 h-8 bg-teal-100 rounded-xl flex items-center justify-center group-hover:bg-teal-200 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </div>
                <span>Kembali ke Daftar GOR</span>
            </a>

            <!-- Main Card -->
            <div class="bg-white/90 backdrop-blur-xl overflow-hidden shadow-2xl rounded-3xl border border-white/50 mb-6 animate-fade-in-up">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">

                    <!-- Left Section: Field Details -->
                    <div class="space-y-6">
                        <div class="flex items-center space-x-3 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-teal-600 rounded-2xl flex items-center justify-center shadow-lg">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800">Detail Lapangan</h3>
                        </div>

                        <!-- Info Cards -->
                        <div class="space-y-3">
                            <!-- Nama Lapangan -->
                            <div class="group flex items-start space-x-4 p-4 rounded-2xl bg-gradient-to-r from-teal-50 to-emerald-50 border border-teal-100 hover:border-teal-300 transition-all duration-300 hover:shadow-lg">
                                <div class="w-10 h-10 bg-gradient-to-br from-teal-500 to-teal-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-md transform group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama Lapangan</p>
                                    <p class="text-base font-bold text-gray-900 mt-1">{{ $field->nama }}</p>
                                </div>
                            </div>

                            <!-- Jenis -->
                            <div class="group flex items-start space-x-4 p-4 rounded-2xl bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-100 hover:border-blue-300 transition-all duration-300 hover:shadow-lg">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-md transform group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Jenis Lapangan</p>
                                    <p class="text-base font-bold text-gray-900 mt-1">{{ $field->jenis }}</p>
                                </div>
                            </div>

                            <!-- Harga -->
                            <div class="group flex items-start space-x-4 p-5 rounded-2xl bg-gradient-to-r from-green-50 to-emerald-50 border-2 border-green-200 hover:border-green-400 transition-all duration-300 hover:shadow-xl shadow-lg">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg transform group-hover:scale-110 transition-transform duration-300 animate-pulse">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Harga Sewa</p>
                                    <p class="text-2xl font-bold text-green-700 mt-1">Rp {{ number_format($field->harga_per_jam, 0, ',', '.') }}<span class="text-base text-gray-600">/jam</span></p>
                                </div>
                            </div>

                            <!-- GOR Info -->
                            <div class="group flex items-start space-x-4 p-4 rounded-2xl bg-gradient-to-r from-purple-50 to-pink-50 border border-purple-100 hover:border-purple-300 transition-all duration-300 hover:shadow-lg">
                                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-md transform group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Gedung Olahraga</p>
                                    <p class="text-base font-bold text-gray-900 mt-1">{{ $field->gor->nama }}</p>
                                </div>
                            </div>

                            <!-- Alamat -->
                            <div class="group flex items-start space-x-4 p-4 rounded-2xl bg-gradient-to-r from-orange-50 to-amber-50 border border-orange-100 hover:border-orange-300 transition-all duration-300 hover:shadow-lg">
                                <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-md transform group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Alamat</p>
                                    <p class="text-sm font-semibold text-gray-900 mt-1">{{ $field->gor->alamat }}</p>
                                </div>
                            </div>

                            <!-- Telepon -->
                            <div class="group flex items-start space-x-4 p-4 rounded-2xl bg-gradient-to-r from-cyan-50 to-sky-50 border border-cyan-100 hover:border-cyan-300 transition-all duration-300 hover:shadow-lg">
                                <div class="w-10 h-10 bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-md transform group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Telepon</p>
                                    <p class="text-base font-bold text-gray-900 mt-1">{{ $field->gor->telepon }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Section: Schedule -->
                    <div class="space-y-6">
                        <div class="flex items-center space-x-3 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800">Jadwal Operasional</h3>
                        </div>

                        @if($field->schedules->count())
                            <!-- Modern Schedule Table -->
                            <div class="overflow-hidden rounded-2xl border-2 border-slate-200 shadow-xl">
                                <table class="min-w-full bg-white">
                                    <thead class="bg-gradient-to-r from-slate-800 to-slate-900">
                                        <tr>
                                            <th class="text-left py-4 px-5 text-white font-bold text-sm uppercase tracking-wider">Hari</th>
                                            <th class="text-left py-4 px-5 text-white font-bold text-sm uppercase tracking-wider">Jam Operasional</th>
                                            <th class="text-center py-4 px-5 text-white font-bold text-sm uppercase tracking-wider">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-200">
                                        @foreach($field->schedules->sortBy('hari') as $index => $s)
                                            <tr class="group hover:bg-gradient-to-r hover:from-slate-50 hover:to-transparent transition-all duration-200 animate-fade-in-up" style="animation-delay: {{ $index * 50 }}ms">
                                                <!-- Day -->
                                                <td class="py-4 px-5">
                                                    <div class="flex items-center space-x-3">
                                                        <div class="w-8 h-8 bg-gradient-to-br from-teal-100 to-teal-200 rounded-lg flex items-center justify-center transform group-hover:scale-110 transition-transform duration-200">
                                                            <span class="text-teal-700 font-bold text-xs">{{ substr(\App\Models\FieldSchedule::hariLabels()[$s->hari] ?? $s->hari, 0, 2) }}</span>
                                                        </div>
                                                        <span class="font-semibold text-gray-800">{{ \App\Models\FieldSchedule::hariLabels()[$s->hari] ?? $s->hari }}</span>
                                                    </div>
                                                </td>

                                                <!-- Time -->
                                                <td class="py-4 px-5">
                                                    <div class="flex items-center space-x-2">
                                                        <div class="flex items-center space-x-1 bg-slate-100 px-3 py-1.5 rounded-lg">
                                                            <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                            </svg>
                                                            <span class="font-mono font-semibold text-sm text-gray-800">{{ $s->jam_buka }}</span>
                                                        </div>
                                                        <span class="text-gray-400 font-bold">→</span>
                                                        <div class="flex items-center space-x-1 bg-slate-100 px-3 py-1.5 rounded-lg">
                                                            <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                            </svg>
                                                            <span class="font-mono font-semibold text-sm text-gray-800">{{ $s->jam_tutup }}</span>
                                                        </div>
                                                    </div>
                                                </td>

                                                <!-- Status -->
                                                <td class="py-4 px-5 text-center">
                                                    @if($s->is_available)
                                                        <span class="inline-flex items-center space-x-2 px-4 py-2 rounded-xl bg-gradient-to-r from-green-500 to-emerald-500 text-white font-bold text-sm shadow-lg transform group-hover:scale-110 transition-all duration-200">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                            </svg>
                                                            <span>Buka</span>
                                                        </span>
                                                    @else
                                                        <span class="inline-flex items-center space-x-2 px-4 py-2 rounded-xl bg-gradient-to-r from-red-500 to-rose-500 text-white font-bold text-sm shadow-lg">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                            </svg>
                                                            <span>Tutup</span>
                                                        </span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <!-- Empty Schedule State -->
                            <div class="flex flex-col items-center justify-center py-12 bg-gradient-to-br from-slate-50 to-slate-100 rounded-2xl border-2 border-dashed border-slate-300">
                                <div class="w-20 h-20 bg-slate-200 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-500 font-semibold">Jadwal belum diatur</p>
                                <p class="text-gray-400 text-sm mt-1">Hubungi admin untuk informasi lebih lanjut</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- CTA Button Section -->
                <div class="px-8 pb-8 pt-4 border-t border-gray-100">
                    <a href="{{ route('customer.booking.create', $field) }}" class="group relative inline-flex items-center justify-center space-x-3 w-full bg-gradient-to-r from-teal-500 to-emerald-600 text-white px-8 py-5 rounded-2xl font-bold text-xl shadow-2xl hover:shadow-teal-500/50 transform hover:scale-[1.02] transition-all duration-300 overflow-hidden">
                        <!-- Animated Background -->
                        <div class="absolute inset-0 bg-gradient-to-r from-teal-600 to-emerald-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                        <!-- Icon -->
                        <div class="relative z-10 w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>

                        <!-- Text -->
                        <span class="relative z-10">🎾 Booking Sekarang</span>

                        <!-- Arrow -->
                        <svg class="relative z-10 w-6 h-6 transform group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

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

        /* Staggered animation for table rows */
        @media (prefers-reduced-motion: no-preference) {
            .animate-fade-in-up {
                animation: fade-in-up 0.4s ease-out backwards;
            }
        }
    </style>
</x-app-layout>
