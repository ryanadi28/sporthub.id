<x-app-layout>
    <x-slot name="mainLogoRoute">
        {{ route('home') }}
    </x-slot>

    {{-- Elegant Landing Page - Selamat Datang di sporthub.id --}}
    <section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-white via-gray-50 to-gray-100 relative overflow-hidden">
        {{-- Subtle Background Elements --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/4 -right-20 w-96 h-96 bg-teal-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
            <div class="absolute bottom-1/4 -left-20 w-96 h-96 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>

            {{-- Geometric Pattern --}}
            <div class="absolute inset-0 opacity-[0.03]">
                <div class="absolute top-0 left-0 w-full h-full" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23000000" fill-opacity="0.05"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
            </div>
        </div>

        <div class="container mx-auto px-4 py-12 relative z-10">
            <div class="max-w-6xl mx-auto">
                {{-- Header Section --}}
                <div class="text-center mb-16">
                    {{-- Elegant Logo dengan Full Rounded --}}
                    <div class="mb-8">
                        <div class="inline-flex items-center justify-center w-32 h-32 shadow-2xl transform hover:scale-105 transition-transform duration-300">
                            {{-- Fallback jika image tidak ada --}}
                            @if(file_exists(public_path('images/logo-sporthub.png')))
                                <img
                                    src="{{ asset('images/logo-sporthub.png') }}"
                                    alt="SportHub Logo"
                                    class="w-full h-full object-cover rounded-3xl"
                                    onerror="this.onerror=null; this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzAwIiBoZWlnaHQ9IjMwMCIgdmlld0JveD0iMCAwIDMwMCAzMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIzMDAiIGhlaWdodD0iMzAwIiByeD0iMzAiIGZpbGw9IiMwRENBQUEiLz4KPGNpcmNsZSBjeD0iMTUwIiBjeT0iMTUwIiByPSI4MCIgc3Ryb2tlPSJ3aGl0ZSIgc3Ryb2tlLXdpZHRoPSIxMCIvPgo8Y2lyY2xlIGN4PSIxNTAiIGN5PSIxNTAiIHI9IjQwIiBzdHJva2U9IndoaXRlIiBzdHJva2Utd2lkdGg9IjgiLz4KPHBhdGggZD0iTTExMiAxNTAgTDEzMCAxNzAgTDE5MCAxMjAiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS13aWR0aD0iMTIiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPgo8cGF0aCBkPSJNMTUwIDIwMCBMMTUwIDI0MCIgc3Ryb2tlPSJ3aGl0ZSIgc3Ryb2tlLXdpZHRoPSIxMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIi8+Cjwvc3ZnPg=='"
                                >
                            @else
                                {{-- Fallback SVG dengan rounded corners --}}
                                <div class="w-full h-full rounded-3xl bg-gradient-to-br from-teal-500 to-teal-600 flex items-center justify-center">
                                    <svg class="w-24 h-24 text-white" viewBox="0 0 100 100" fill="none">
                                        <circle cx="50" cy="50" r="30" stroke="white" stroke-width="4"/>
                                        <circle cx="50" cy="50" r="18" stroke="white" stroke-width="3"/>
                                        <path d="M38 50 L45 57 L62 40" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M50 68 L50 80" stroke="white" stroke-width="4" stroke-linecap="round"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Welcome Text --}}
                    <div class="mb-8">
                        <h1 class="text-5xl md:text-6xl font-light text-gray-800 mb-4 tracking-tight">
                            Selamat Datang di
                        </h1>
                        <h2 class="text-6xl md:text-8xl font-bold mb-6">
                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-teal-600 to-teal-500">sporthub</span>
                            <span class="text-gray-800">.id</span>
                        </h2>

                        <div class="w-32 h-1 bg-gradient-to-r from-teal-400 to-teal-500 mx-auto mb-8"></div>

                        <p class="text-xl md:text-2xl text-gray-600 mb-12 max-w-3xl mx-auto leading-relaxed">
                            Platform booking lapangan olahraga terpercaya dan mudah di Indonesia
                        </p>
                    </div>
                </div>

                {{-- Main Content --}}
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    {{-- Left Column: Features --}}
                    <div class="space-y-8">
                        <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-14 h-14 bg-teal-50 rounded-xl flex items-center justify-center">
                                        <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Booking Online Mudah</h3>
                                    <p class="text-gray-600">Booking lapangan favorit Anda hanya dengan beberapa klik, kapan saja dan di mana saja.</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-14 h-14 bg-teal-50 rounded-xl flex items-center justify-center">
                                        <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Jadwal Real-time</h3>
                                    <p class="text-gray-600">Lihat ketersediaan lapangan secara real-time dan dapatkan konfirmasi instan.</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300 border border-gray-100">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-14 h-14 bg-teal-50 rounded-xl flex items-center justify-center">
                                        <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Pembayaran Aman</h3>
                                    <p class="text-gray-600">Transaksi aman dengan berbagai metode pembayaran yang terpercaya.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Right Column: CTA & Stats --}}
                    <div class="space-y-10">
                        {{-- CTA Card --}}
                        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl p-10 shadow-2xl border border-gray-200">
                            <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Mulai Pengalaman Olahraga Anda</h3>

                            <div class="space-y-6 mb-8">
                                @auth
                                    <a href="{{ route('customer.booking.index') }}"
                                       class="block w-full bg-gradient-to-r from-teal-500 to-teal-600 text-white px-6 py-4 rounded-xl font-bold text-lg hover:from-teal-600 hover:to-teal-700 transform hover:scale-[1.02] transition-all duration-300 shadow-lg hover:shadow-xl text-center group">
                                        <div class="flex items-center justify-center space-x-3">
                                            <svg class="w-6 h-6 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                            </svg>
                                            <span>Mulai Booking Sekarang</span>
                                        </div>
                                    </a>
                                @else
                                    <div class="space-y-4">
                                        <a href="{{ route('login') }}"
                                           class="block w-full bg-gradient-to-r from-teal-500 to-teal-600 text-white px-6 py-4 rounded-xl font-bold text-lg hover:from-teal-600 hover:to-teal-700 transform hover:scale-[1.02] transition-all duration-300 shadow-lg hover:shadow-xl text-center group">
                                            <div class="flex items-center justify-center space-x-3">
                                                <svg class="w-6 h-6 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                                </svg>
                                                <span>Masuk ke Akun</span>
                                            </div>
                                        </a>

                                        <div class="relative">
                                            <div class="absolute inset-0 flex items-center">
                                                <div class="w-full border-t border-gray-300"></div>
                                            </div>
                                            <div class="relative flex justify-center text-sm">
                                                <span class="px-4 bg-gradient-to-br from-white to-gray-50 text-gray-500">atau</span>
                                            </div>
                                        </div>

                                        <a href="{{ route('register') }}"
                                           class="block w-full border-2 border-teal-500 text-teal-600 px-6 py-4 rounded-xl font-bold text-lg hover:bg-teal-50 hover:border-teal-600 hover:text-teal-700 transform hover:scale-[1.02] transition-all duration-300 text-center group">
                                            <div class="flex items-center justify-center space-x-3">
                                                <svg class="w-6 h-6 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                                </svg>
                                                <span>Daftar Gratis</span>
                                            </div>
                                        </a>
                                    </div>
                                @endauth
                            </div>

                            {{-- Statistics --}}
                            <div class="grid grid-cols-3 gap-4 pt-8 border-t border-gray-200">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-teal-600 mb-1">2+</div>
                                    <div class="text-sm text-gray-600 font-medium">Lapangan</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-teal-600 mb-1">1K+</div>
                                    <div class="text-sm text-gray-600 font-medium">Pengguna</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-teal-600 mb-1">50+</div>
                                    <div class="text-sm text-gray-600 font-medium">Booking</div>
                                </div>
                            </div>
                        </div>

                        {{-- Sports Categories --}}
                        <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                            <h4 class="text-xl font-semibold text-gray-800 mb-6 text-center">Pilih Kategori Olahraga</h4>
                            <div class="grid grid-cols-2 gap-4">
                                <a href="#" class="group block">
                                    <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 text-center transition-all duration-300 transform group-hover:-translate-y-1 group-hover:shadow-lg border border-gray-200 group-hover:border-teal-300">
                                        <div class="text-4xl mb-3">🏸</div>
                                        <div class="font-semibold text-gray-800 group-hover:text-teal-600">Badminton</div>
                                        <div class="text-sm text-gray-500 mt-1">2+ lapangan</div>
                                    </div>
                                </a>
                                <a href="#" class="group block">
                                    <div class="bg-gradient-to-br from-gray-50 to-white rounded-xl p-6 text-center transition-all duration-300 transform group-hover:-translate-y-1 group-hover:shadow-lg border border-gray-200 group-hover:border-teal-300">
                                        <div class="text-4xl mb-3">⚽</div>
                                        <div class="font-semibold text-gray-800 group-hover:text-teal-600">Futsal</div>
                                        <div class="text-sm text-gray-500 mt-1">0+ lapangan</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Testimonials Section --}}
                <div class="mt-20 pt-12 border-t border-gray-200">
                    <div class="text-center mb-12">
                        <h3 class="text-3xl font-bold text-gray-800 mb-4">Apa Kata Pengguna Kami</h3>
                        <p class="text-gray-600 max-w-2xl mx-auto">Ribuan pelanggan puas telah menggunakan sporthub.id untuk kebutuhan olahraga mereka</p>
                    </div>

                    <div class="grid md:grid-cols-3 gap-8">
                        <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-teal-100 to-teal-50 rounded-full flex items-center justify-center text-teal-600 font-bold text-xl mr-4">
                                    AS
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Andi Setiawan</h4>
                                    <p class="text-sm text-gray-500">Pecinta Badminton</p>
                                </div>
                            </div>
                            <p class="text-gray-600 italic">"Booking lapangan badminton jadi sangat mudah dengan sporthub.id. Jadwal real-time sangat membantu!"</p>
                        </div>

                        <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-teal-100 to-teal-50 rounded-full flex items-center justify-center text-teal-600 font-bold text-xl mr-4">
                                    SM
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Sari Mulyani</h4>
                                    <p class="text-sm text-gray-500">Tim Futsal Kampus</p>
                                </div>
                            </div>
                            <p class="text-gray-600 italic">"Platform yang sangat user-friendly. Tim futsal kami sekarang selalu booking via sporthub.id"</p>
                        </div>

                        <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-teal-100 to-teal-50 rounded-full flex items-center justify-center text-teal-600 font-bold text-xl mr-4">
                                    RD
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-800">Rudi Darmawan</h4>
                                    <p class="text-sm text-gray-500">Atlet Basket</p>
                                </div>
                            </div>
                            <p class="text-gray-600 italic">"Pembayaran mudah dan aman. Tidak perlu lagi repot datang langsung ke lokasi untuk booking."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
