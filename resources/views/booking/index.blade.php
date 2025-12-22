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
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-lg transform hover:scale-110 transition-all duration-300 animate-bounce-slow">
                        <svg class="w-10 h-10 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-bold text-3xl text-white leading-tight tracking-tight animate-fade-in-down">
                            Booking Lapangan
                        </h2>
                        <p class="text-teal-300 text-sm mt-1 font-medium animate-fade-in-up">
                            sporthub<span class="text-white">.id</span> - Pesan Lapangan Favoritmu
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 to-teal-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- My Booking Button -->
            <div class="mb-8 flex justify-between items-center animate-fade-in-down">
                <a href="{{ route('customer.booking.mine') }}" class="group relative inline-flex items-center space-x-3 bg-gradient-to-r from-slate-700 to-slate-800 text-white px-6 py-3 rounded-2xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                    <div class="relative z-10 w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center transition-all duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                    <span class="relative z-10">Lihat Booking Saya</span>
                    <div class="relative z-10 bg-teal-500 text-white text-xs font-bold px-2 py-1 rounded-full animate-pulse">📋</div>
                </a>
            </div>

            <!-- GOR Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($gors as $index => $gor)
                    <div class="group relative bg-white/90 backdrop-blur-xl overflow-hidden shadow-xl rounded-3xl border border-white/50 transform hover:scale-[1.03] transition-all duration-300 hover:shadow-2xl animate-fade-in-up" style="animation-delay: {{ $index * 100 }}ms">
                        <!-- Gradient Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-br from-teal-500/0 to-teal-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                        <!-- Card Header with Icon -->
                        <div class="relative p-6 pb-4 bg-gradient-to-br from-teal-500 to-teal-600">
                            <div class="absolute top-4 right-4 w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-md transform group-hover:scale-110 transition-all duration-300">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>

                            <h3 class="text-2xl font-bold text-white mb-2 pr-16 transition-all duration-300">
                                {{ $gor->nama }}
                            </h3>

                            <!-- Fields Count Badge -->
                            <div class="inline-flex items-center space-x-2 bg-white/20 backdrop-blur-md px-4 py-2 rounded-xl border border-white/30">
                                <div class="w-2 h-2 bg-teal-200 rounded-full animate-ping"></div>
                                <div class="w-2 h-2 bg-teal-200 rounded-full -ml-3"></div>
                                <span class="text-white font-semibold text-sm ml-2">{{ $gor->fields->count() }} Lapangan</span>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="relative p-6 space-y-4">
                            <!-- Address -->
                            <div class="flex items-start space-x-3 group/item">
                                <div class="w-10 h-10 bg-gradient-to-br from-teal-100 to-teal-200 rounded-xl flex items-center justify-center flex-shrink-0 transform group-hover/item:scale-110 transition-transform duration-300">
                                    <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-500 font-medium">Alamat</p>
                                    <p class="text-sm text-gray-800 font-semibold mt-1">{{ $gor->alamat }}</p>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="flex items-start space-x-3 group/item">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center flex-shrink-0 transform group-hover/item:scale-110 transition-transform duration-300">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm text-gray-500 font-medium">Telepon</p>
                                    <p class="text-sm text-gray-800 font-semibold mt-1">{{ $gor->telepon }}</p>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="pt-2 pb-3 border-t border-gray-200">
                                <p class="text-sm text-gray-600 leading-relaxed">
                                    {{ Str::limit($gor->deskripsi, 100) }}
                                </p>
                            </div>

                            <!-- Fields List -->
                            <div class="space-y-2 pt-2">
                                <div class="flex items-center space-x-2 mb-3">
                                    <div class="h-px flex-1 bg-gradient-to-r from-transparent via-teal-300 to-transparent"></div>
                                    <span class="text-xs font-bold text-teal-600 uppercase tracking-wider">Pilih Lapangan</span>
                                    <div class="h-px flex-1 bg-gradient-to-r from-transparent via-teal-300 to-transparent"></div>
                                </div>

                                @foreach($gor->fields as $fieldIndex => $field)
                                    <a href="{{ route('customer.booking.field', $field) }}" class="group/field relative block bg-gradient-to-r from-teal-50 to-emerald-50 hover:from-teal-100 hover:to-emerald-100 rounded-2xl p-4 border-2 border-transparent hover:border-teal-400 transition-all duration-200 transform hover:scale-[1.02] overflow-hidden" style="animation-delay: {{ ($index * 100) + ($fieldIndex * 50) }}ms">
                                        <!-- Shimmer Effect -->
                                        <div class="absolute inset-0 -translate-x-full group-hover/field:translate-x-full bg-gradient-to-r from-transparent via-white/40 to-transparent transition-transform duration-700"></div>

                                        <div class="relative flex items-center justify-between">
                                            <div class="flex items-center space-x-3 flex-1">
                                                <!-- Field Icon -->
                                                <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-teal-600 rounded-xl flex items-center justify-center shadow-lg transform group-hover/field:scale-110 transition-all duration-200">
                                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                </div>

                                                <div class="flex-1">
                                                    <p class="font-bold text-gray-900 text-base group-hover/field:text-teal-700 transition-colors duration-200">
                                                        {{ $field->nama }}
                                                    </p>
                                                    <div class="flex items-center space-x-2 mt-1">
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg bg-white/60 text-xs font-medium text-gray-700 border border-gray-200">
                                                            {{ $field->jenis }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Price Badge -->
                                            <div class="flex flex-col items-end ml-3">
                                                <div class="bg-gradient-to-br from-green-500 to-emerald-600 text-white px-4 py-2 rounded-xl shadow-lg transform group-hover/field:scale-105 transition-all duration-200">
                                                    <p class="text-xs font-medium opacity-90">Mulai dari</p>
                                                    <p class="text-lg font-bold leading-tight">Rp {{ number_format($field->harga_per_jam, 0, ',', '.') }}</p>
                                                    <p class="text-xs opacity-90">/jam</p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Booking Arrow -->
                                        <div class="absolute right-3 top-1/2 -translate-y-1/2 transform translate-x-0 group-hover/field:translate-x-1 transition-transform duration-200 opacity-0 group-hover/field:opacity-100">
                                            <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                            </svg>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <!-- Card Footer Indicator -->
                        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-teal-400 via-teal-500 to-emerald-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
                    </div>
                @empty
                    <!-- Empty State -->
                    <div class="col-span-3 flex flex-col items-center justify-center py-16 animate-fade-in-up">
                        <div class="w-32 h-32 bg-gradient-to-br from-teal-100 to-teal-200 rounded-full flex items-center justify-center mb-6 animate-bounce-slow">
                            <svg class="w-16 h-16 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada GOR Terdaftar</h3>
                        <p class="text-gray-500">Silakan hubungi admin untuk menambahkan GOR</p>
                    </div>
                @endforelse
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

        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .animate-fade-in-down { animation: fade-in-down 0.6s ease-out; }
        .animate-fade-in-up { animation: fade-in-up 0.6s ease-out; }
        .animate-bounce-slow { animation: bounce-slow 3s ease-in-out infinite; }
        .delay-700 { animation-delay: 0.7s; }

        /* Staggered animation for cards */
        @media (prefers-reduced-motion: no-preference) {
            .animate-fade-in-up {
                animation: fade-in-up 0.6s ease-out backwards;
            }
        }
    </style>
</x-app-layout>
