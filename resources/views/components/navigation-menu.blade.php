@php
    $userRole = Auth::User()?->role()->first()->name;

    // Count pending bookings for Admin GOR notification
    $pendingBookingsCount = 0;
    if ($userRole === 'Admin GOR' && Auth::check()) {
        $gorIds = \App\Models\Gor::where('owner_user_id', Auth::id())->pluck('id');
        $fieldIds = \App\Models\Field::whereIn('gor_id', $gorIds)->pluck('id');
        $pendingBookingsCount = \App\Models\Booking::whereIn('field_id', $fieldIds)
            ->where('status', 'pending')
            ->count();
    }
@endphp

<nav x-data="{ open: false, userDropdownOpen: false }" class="bg-gradient-to-r from-gray-900 to-gray-800 border-b border-gray-700 z-50 sticky top-0 shadow-lg">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo Section -->
            <div class="flex items-center">
                @php
                    $appMarkRoute = isset($mainLogoRoute) ? $mainLogoRoute : route('dashboard');
                @endphp

                <a href="{{ $appMarkRoute }}" class="flex items-center space-x-3 group">
                    <div class="shrink-0 bg-white/10 backdrop-blur-sm p-2 rounded-xl transition-all duration-300 group-hover:bg-white/20 group-hover:shadow-lg">
                        <img src="{{ asset('images/logo-sporthub.png') }}" alt="Logo Sporthub"
                             class="h-9 w-auto transition-transform duration-300 group-hover:scale-110" />
                    </div>

                </a>
            </div>

            <!-- Desktop Navigation Links -->
            <div class="hidden md:flex md:items-center md:space-x-1">
                <!-- Public Navigation -->
                @if(!Auth::check())
                    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')"
                               class="px-4 py-2 rounded-lg hover:bg-white/10 text-white transition-all duration-200">
                        <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-web.navlinks />
                @endif

                <!-- Auth Navigation -->
                @auth
                    @if($userRole === 'Admin Platform')
                        <x-nav-link href="{{ route('dashboard.platform') }}" :active="request()->routeIs('dashboard.platform')"
                                   class="px-4 py-2 rounded-lg hover:bg-white/10 text-white transition-all duration-200">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('platform.gor-admins.create') }}" :active="request()->routeIs('platform.gor-admins.create')"
                                   class="px-4 py-2 rounded-lg hover:bg-white/10 text-white transition-all duration-200">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            {{ __('Tambah Admin') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('gors.index') }}" :active="request()->routeIs('gors.*')"
                                   class="px-4 py-2 rounded-lg hover:bg-white/10 text-white transition-all duration-200">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            {{ __('Kelola GOR') }}
                        </x-nav-link>
                    @elseif($userRole === 'Admin GOR')
                        <x-nav-link href="{{ route('dashboard.gor.dashboard') }}" :active="request()->routeIs('dashboard.gor.dashboard')"
                                   class="px-4 py-2 rounded-lg hover:bg-white/10 text-white transition-all duration-200">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('gor.bookings.index') }}" :active="request()->routeIs('gor.bookings.*')"
                                   class="px-4 py-2 rounded-lg hover:bg-white/10 text-white transition-all duration-200 relative">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            {{ __('Kelola Booking') }}
                            @if($pendingBookingsCount > 0)
                                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center animate-pulse">
                                    {{ $pendingBookingsCount }}
                                </span>
                            @endif
                        </x-nav-link>
                        <x-nav-link href="{{ route('gors.index') }}" :active="request()->routeIs('gors.*')"
                                   class="px-4 py-2 rounded-lg hover:bg-white/10 text-white transition-all duration-200">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            {{ __('Kelola GOR') }}
                        </x-nav-link>
                    @elseif($userRole === 'Pelanggan')
                        <x-nav-link href="{{ route('customer.booking.mine') }}" :active="request()->routeIs('customer.booking.mine')"
                                   class="px-4 py-2 rounded-lg hover:bg-white/10 text-white transition-all duration-200">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            {{ __('Booking Saya') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('customer.booking.index') }}" :active="request()->routeIs('customer.booking.index')"
                                   class="px-4 py-2 rounded-lg hover:bg-white/10 text-white transition-all duration-200">
                            <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            {{ __('Booking Lapangan') }}
                        </x-nav-link>
                    @endif
                @else
                    <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')"
                               class="px-4 py-2 rounded-lg hover:bg-white/10 text-white transition-all duration-200">
                        <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        {{ __('Masuk') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')"
                               class="bg-gradient-to-r from-teal-500 to-teal-600 text-white px-4 py-2 rounded-lg hover:from-teal-600 hover:to-teal-700 transition-all duration-300 shadow-lg hover:shadow-xl">
                        <svg class="w-4 h-4 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        {{ __('Daftar') }}
                    </x-nav-link>
                @endif
            </div>

            <!-- User Dropdown (Desktop) -->
            @auth
            <div class="hidden md:flex md:items-center md:ml-4">
                <div class="relative" x-data="{ open: false }" @click.away="open = false">
                    <button @click="open = !open"
                            class="flex items-center space-x-3 p-2 rounded-lg hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-opacity-50 transition-all duration-200 group">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <div class="relative">
                                <img class="h-9 w-9 rounded-full object-cover border-2 border-gray-600 group-hover:border-teal-500 transition-all duration-300"
                                     src="{{ Auth::user()->profile_photo_url }}"
                                     alt="{{ Auth::user()->name }}" />
                                <div class="absolute -bottom-1 -right-1 h-3 w-3 bg-teal-500 rounded-full border-2 border-gray-900"></div>
                            </div>
                        @else
                            <div class="h-9 w-9 rounded-full bg-gradient-to-br from-teal-500 to-teal-600 flex items-center justify-center text-white font-semibold shadow-lg">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        @endif
                        <div class="text-left hidden lg:block">
                            <div class="text-sm font-medium text-white">{{ Auth::user()->name }}</div>
                            <div class="text-xs text-teal-300 capitalize">{{ $userRole }}</div>
                        </div>
                        <svg class="w-4 h-4 text-gray-400 transition-transform duration-200"
                             :class="{ 'rotate-180': open }"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="absolute right-0 mt-2 w-64 bg-gray-800 rounded-lg shadow-xl border border-gray-700 py-1 z-50">
                        <!-- User Info -->
                        <div class="px-4 py-3 border-b border-gray-700">
                            <p class="text-sm font-medium text-white">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-300 truncate">{{ Auth::user()->email }}</p>
                            <p class="text-xs text-teal-300 font-medium mt-1 capitalize">{{ $userRole }}</p>
                        </div>

                        <!-- Links -->
                        <x-dropdown-link href="{{ route('profile.show') }}" class="flex items-center px-4 py-2 hover:bg-gray-700 text-white">
                            <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            {{ __('Profil Saya') }}
                        </x-dropdown-link>

                        {{-- API Tokens removed --}}

                        <!-- Team Management -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="border-t border-gray-700 my-1"></div>
                            <div class="px-4 py-2 text-xs text-gray-400 font-medium">{{ __('Kelola Tim') }}</div>

                            <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                                           class="flex items-center px-4 py-2 hover:bg-gray-700 text-white">
                                <svg class="w-4 h-4 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                </svg>
                                {{ __('Pengaturan Tim') }}
                            </x-dropdown-link>
                        @endif

                        <!-- Logout -->
                        <div class="border-t border-gray-700 my-1"></div>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                                <button type="submit"
                                    class="flex items-center w-full px-4 py-2 text-sm text-white hover:bg-gray-700 hover:text-red-300">
                                <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                {{ __('Keluar') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endauth

            <!-- Mobile menu button -->
            <div class="flex items-center md:hidden">
                <button @click="open = ! open"
                        class="p-2 rounded-lg text-gray-300 hover:text-white hover:bg-white/10 focus:outline-none focus:bg-white/10 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="md:hidden bg-gray-800 border-t border-gray-700">
        <div class="pt-2 pb-3 space-y-1">
            <!-- Public Mobile Links -->
            @if(!Auth::check())
                <x-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')" class="text-gray-100 hover:bg-gray-700">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    {{ __('Home') }}
                </x-responsive-nav-link>
            @endif

            <!-- Auth Mobile Links -->
            @auth
                @if($userRole === 'Admin Platform')
                    <x-responsive-nav-link href="{{ route('dashboard.platform') }}" :active="request()->routeIs('dashboard.platform')" class="text-gray-100 hover:bg-gray-700">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('platform.gor-admins.create') }}" :active="request()->routeIs('platform.gor-admins.create')" class="text-gray-100 hover:bg-gray-700">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        {{ __('Tambah Admin') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('gors.index') }}" :active="request()->routeIs('gors.*')" class="text-gray-100 hover:bg-gray-700">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        {{ __('Kelola GOR') }}
                    </x-responsive-nav-link>
                @elseif($userRole === 'Admin GOR')
                    <x-responsive-nav-link href="{{ route('dashboard.gor') }}" :active="request()->routeIs('dashboard.gor')" class="text-gray-100 hover:bg-gray-700">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('gors.index') }}" :active="request()->routeIs('gors.*')" class="text-gray-100 hover:bg-gray-700">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        {{ __('Kelola GOR') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('gor.bookings.index') }}" :active="request()->routeIs('gor.bookings.*')" class="text-gray-100 hover:bg-gray-700 relative">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        {{ __('Kelola Booking') }}
                        @if($pendingBookingsCount > 0)
                            <span class="ml-2 bg-red-500 text-white text-xs font-bold rounded-full px-2 py-0.5">{{ $pendingBookingsCount }}</span>
                        @endif
                    </x-responsive-nav-link>
                @elseif($userRole === 'Pelanggan')
                    <x-responsive-nav-link href="{{ route('customer.booking.index') }}" :active="request()->routeIs('customer.booking.index')" class="text-gray-100 hover:bg-gray-700">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        {{ __('Booking Lapangan') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('customer.booking.mine') }}" :active="request()->routeIs('customer.booking.mine')" class="text-gray-100 hover:bg-gray-700">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        {{ __('Booking Saya') }}
                    </x-responsive-nav-link>
                @endif
            @else
                <x-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')" class="text-gray-100 hover:bg-gray-700">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                    </svg>
                    {{ __('Masuk') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')" class="bg-teal-600 text-white hover:bg-teal-700">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                    {{ __('Daftar Gratis') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Mobile User Info -->
        @auth
        <div class="pt-4 pb-3 border-t border-gray-700">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <img class="h-10 w-10 rounded-full object-cover border-2 border-gray-600"
                         src="{{ Auth::user()->profile_photo_url }}"
                         alt="{{ Auth::user()->name }}" />
                @else
                    <div class="h-10 w-10 rounded-full bg-gradient-to-br from-teal-500 to-teal-600 flex items-center justify-center text-white font-semibold shadow">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                @endif
                <div class="ml-3">
                    <div class="text-base font-medium text-white">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-gray-300">{{ Auth::user()->email }}</div>
                    <div class="text-xs text-teal-300 font-medium capitalize">{{ $userRole }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')" class="text-gray-100 hover:bg-gray-700">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    {{ __('Profil Saya') }}
                </x-responsive-nav-link>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();" class="text-gray-100 hover:bg-gray-700 hover:text-red-300">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        {{ __('Keluar') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endauth
    </div>
</nav>
