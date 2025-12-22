<x-app-layout>
    <x-slot name="mainLogoRoute">
        {{ route('home') }}
    </x-slot>

    {{-- Landing Page - Selamat Datang di sporthub.id --}}
    <section class="min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-900 via-teal-900 to-slate-900 relative overflow-hidden">
        {{-- Background Decoration --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-teal-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-teal-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>
        </div>

        <div class="text-center px-4 relative z-10 max-w-5xl mx-auto">
            {{-- Logo --}}
            <div class="mb-6">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-white rounded-full shadow-2xl">
                    <svg class="w-12 h-12 text-teal-500" viewBox="0 0 100 100" fill="none">
                        <circle cx="50" cy="50" r="30" stroke="currentColor" stroke-width="4"/>
                        <circle cx="50" cy="50" r="18" stroke="currentColor" stroke-width="3"/>
                        <path d="M38 50 L45 57 L62 40" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M50 68 L50 80" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                    </svg>
                </div>
            </div>

            {{-- Welcome Text --}}
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-3">
                Selamat Datang di
            </h1>
            <h2 class="text-5xl md:text-7xl font-extrabold mb-6">
                <span class="text-white">sporthub</span><span class="text-teal-400">.id</span>
            </h2>

            <p class="text-lg md:text-xl text-slate-300 mb-10 max-w-2xl mx-auto">
                Platform booking lapangan olahraga terpercaya dan mudah di Indonesia
            </p>

            {{-- CTA Buttons --}}
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
                @auth
                    <a href="{{ route('customer.booking.index') }}"
                       class="inline-flex items-center justify-center bg-teal-500 text-white px-8 py-3 rounded-xl font-bold text-base hover:bg-teal-600 transform hover:scale-105 transition-all shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        Mulai Booking
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="inline-flex items-center justify-center bg-teal-500 text-white px-8 py-3 rounded-xl font-bold text-base hover:bg-teal-600 transform hover:scale-105 transition-all shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        Masuk
                    </a>
                    <a href="{{ route('register') }}"
                       class="inline-flex items-center justify-center border-2 border-teal-400 text-teal-400 px-8 py-3 rounded-xl font-bold text-base hover:bg-teal-500 hover:text-white hover:border-teal-500 transform hover:scale-105 transition-all">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        Daftar Gratis
                    </a>
                @endauth
            </div>

            {{-- Sports Icons --}}
            <div class="flex flex-wrap justify-center gap-6 text-slate-300">
                <div class="flex items-center space-x-2 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg">
                    <span class="text-2xl">🏸</span>
                    <span class="text-sm font-medium">Badminton</span>
                </div>
                <div class="flex items-center space-x-2 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg">
                    <span class="text-2xl">⚽</span>
                    <span class="text-sm font-medium">Futsal</span>
                </div>
                <div class="flex items-center space-x-2 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg">
                    <span class="text-2xl">🏀</span>
                    <span class="text-sm font-medium">Basket</span>
                </div>
                <div class="flex items-center space-x-2 bg-white/10 backdrop-blur-sm px-4 py-2 rounded-lg">
                    <span class="text-2xl">🎾</span>
                    <span class="text-sm font-medium">Tenis</span>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
