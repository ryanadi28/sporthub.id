<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        {{-- Title --}}
        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold text-slate-800">Buat Akun Baru</h2>
            <p class="text-sm text-slate-500 mt-1">Daftar untuk mulai booking lapangan</p>
        </div>

        {{-- Validation Errors --}}
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            {{-- Name Field --}}
            <div>
                <x-label for="name" value="Nama Lengkap" class="text-slate-700 font-semibold" />
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <x-input id="name"
                             class="block w-full pl-10 border-slate-300 focus:border-teal-500 focus:ring-teal-500 rounded-lg"
                             type="text"
                             name="name"
                             :value="old('name')"
                             placeholder="Masukkan nama lengkap"
                             required
                             autofocus
                             autocomplete="name" />
                </div>
            </div>

            {{-- Email Field --}}
            <div>
                <x-label for="email" value="Email" class="text-slate-700 font-semibold" />
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                        </svg>
                    </div>
                    <x-input id="email"
                             class="block w-full pl-10 border-slate-300 focus:border-teal-500 focus:ring-teal-500 rounded-lg"
                             type="email"
                             name="email"
                             :value="old('email')"
                             placeholder="nama@email.com"
                             required
                             autocomplete="username" />
                </div>
            </div>

            {{-- Phone Number Field --}}
            <div>
                <x-label for="phone_number" value="Nomor Telepon" class="text-slate-700 font-semibold" />
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <x-input id="phone_number"
                             class="block w-full pl-10 border-slate-300 focus:border-teal-500 focus:ring-teal-500 rounded-lg"
                             type="text"
                             name="phone_number"
                             :value="old('phone_number')"
                             placeholder="08123456789"
                             required
                             autocomplete="phone_number" />
                </div>
                <p class="text-xs text-slate-500 mt-1">Contoh: 08123456789</p>
            </div>

            {{-- Password Field --}}
            <div>
                <x-label for="password" value="Password" class="text-slate-700 font-semibold" />
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <x-input id="password"
                             class="block w-full pl-10 border-slate-300 focus:border-teal-500 focus:ring-teal-500 rounded-lg"
                             type="password"
                             name="password"
                             placeholder="Min. 8 karakter"
                             required
                             autocomplete="new-password" />
                </div>
            </div>

            {{-- Confirm Password Field --}}
            <div>
                <x-label for="password_confirmation" value="Konfirmasi Password" class="text-slate-700 font-semibold" />
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <x-input id="password_confirmation"
                             class="block w-full pl-10 border-slate-300 focus:border-teal-500 focus:ring-teal-500 rounded-lg"
                             type="password"
                             name="password_confirmation"
                             placeholder="Masukkan password lagi"
                             required
                             autocomplete="new-password" />
                </div>
            </div>

            {{-- Terms and Privacy Policy --}}
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="bg-slate-50 border border-slate-200 rounded-lg p-3">
                    <label for="terms" class="flex items-start cursor-pointer">
                        <x-checkbox name="terms"
                                    id="terms"
                                    class="mt-0.5 rounded border-slate-300 text-teal-600 focus:ring-teal-500"
                                    required />
                        <div class="ml-3 text-sm text-slate-600">
                            Saya setuju dengan
                            <a target="_blank"
                               href="{{ route('terms.show') }}"
                               class="text-teal-600 hover:text-teal-700 font-medium underline">
                                Syarat & Ketentuan
                            </a>
                            dan
                            <a target="_blank"
                               href="{{ route('policy.show') }}"
                               class="text-teal-600 hover:text-teal-700 font-medium underline">
                                Kebijakan Privasi
                            </a>
                        </div>
                    </label>
                </div>
            @endif

            {{-- Register Button --}}
            <div class="pt-2">
                <x-button class="w-full justify-center bg-teal-500 hover:bg-teal-600 focus:bg-teal-600 active:bg-teal-700 py-3 rounded-lg font-semibold text-base shadow-md hover:shadow-lg transition-all">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    Daftar Sekarang
                </x-button>
            </div>

            {{-- Divider --}}
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-slate-200"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-4 bg-white text-slate-500">atau daftar dengan</span>
                </div>
            </div>

            {{-- Google Register Button --}}
            <div>
                <a href="{{ route('auth.google') }}"
                   class="w-full inline-flex items-center justify-center px-4 py-3 bg-white border-2 border-slate-200 rounded-lg font-semibold text-slate-700 hover:bg-slate-50 hover:border-slate-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-200 transition-all shadow-sm hover:shadow-md">
                    <svg class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                    </svg>
                    Daftar dengan Google
                </a>
            </div>

            {{-- Login Link --}}
            <div class="text-center mt-6">
                <span class="text-sm text-slate-600">Sudah punya akun?</span>
                <a href="{{ route('login') }}"
                   class="text-sm text-teal-600 hover:text-teal-700 font-semibold ml-1 transition-colors">
                    Masuk di sini
                </a>
            </div>
        </form>

        {{-- Footer Info --}}
        <div class="mt-8 pt-6 border-t border-slate-100">
            <div class="flex items-center justify-center space-x-2 text-slate-400 text-xs">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
                <span>Data Anda aman dan terenkripsi</span>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
