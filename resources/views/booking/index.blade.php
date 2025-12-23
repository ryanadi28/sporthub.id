<x-app-layout>
    <x-slot name="header">
        <div class="bg-slate-900 py-5 px-6 rounded-xl shadow-md flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-xl text-white">Booking Lapangan</h2>
                    <p class="text-xs text-teal-300">sporthub<span class="text-white">.id</span> • Pilih GOR & Lapangan</p>
                </div>
            </div>

            <a href="{{ route('customer.booking.mine') }}"
               class="inline-flex items-center space-x-2 bg-slate-800 text-white px-4 py-2 rounded-lg text-xs font-semibold hover:bg-slate-700 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                </svg>
                <span>Booking Saya</span>
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                @forelse($gors as $gor)
                    <div class="bg-white rounded-2xl shadow-md overflow-hidden flex flex-col">
                        {{-- Header GOR --}}
                        <div class="bg-gradient-to-r from-teal-500 to-teal-600 px-5 py-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-lg font-bold text-white uppercase tracking-wide">
                                        {{ $gor->nama }}
                                    </h3>
                                    <div class="mt-2 inline-flex items-center space-x-2 bg-white/10 text-xs text-teal-50 px-3 py-1 rounded-full">
                                        <span class="w-2 h-2 rounded-full bg-emerald-300"></span>
                                        <span>{{ $gor->fields->count() }} Lapangan</span>
                                    </div>
                                </div>
                                <div class="w-9 h-9 rounded-xl bg-white/15 flex items-center justify-center text-white">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        {{-- Body GOR --}}
                        <div class="px-5 py-4 space-y-4 flex-1">
                            <div class="space-y-2 text-xs">
                                <div class="flex items-start space-x-2">
                                    <div class="mt-0.5">
                                        <svg class="w-4 h-4 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-slate-500 font-semibold">Alamat</p>
                                        <p class="text-slate-700 mt-0.5 leading-snug">
                                            {{ $gor->alamat }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    <p class="text-xs text-slate-500">
                                        <span class="font-semibold text-slate-700">Telepon:</span>
                                        {{ $gor->telepon }}
                                    </p>
                                </div>
                            </div>

                            <div class="border-t border-slate-100 pt-3">
                                <p class="text-[11px] font-semibold text-teal-600 tracking-wide uppercase mb-2">
                                    Pilih Lapangan
                                </p>

                                {{-- Daftar Lapangan - compact list --}}
                                <div class="space-y-2 max-h-64 overflow-y-auto pr-1">
                                    @foreach($gor->fields as $field)
                                        <a href="{{ route('customer.booking.field', $field) }}"
                                           class="flex items-center justify-between bg-slate-50 hover:bg-teal-50 border border-slate-100 hover:border-teal-400 rounded-xl px-3 py-2 text-xs transition">
                                            <div class="flex items-center space-x-2">
                                                <div class="w-8 h-8 rounded-lg bg-teal-500 flex items-center justify-center text-white flex-shrink-0">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-slate-800 text-xs">
                                                        {{ $field->nama }}
                                                    </p>
                                                    <p class="text-[11px] text-slate-500">
                                                        {{ $field->jenis }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="text-right">
                                                <p class="text-[10px] text-slate-500">Mulai dari</p>
                                                <p class="text-sm font-bold text-teal-600">
                                                    Rp {{ number_format($field->harga_per_jam, 0, ',', '.') }}
                                                </p>
                                                <p class="text-[10px] text-slate-500">/ jam</p>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 flex flex-col items-center justify-center py-16">
                        <div class="w-24 h-24 bg-slate-100 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-slate-700">Belum Ada GOR Terdaftar</h3>
                        <p class="text-sm text-slate-500 mt-1">Silakan hubungi admin untuk menambahkan GOR</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
