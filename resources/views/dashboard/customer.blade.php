@php
    use App\Enums\UserRolesEnum;
    $role = UserRolesEnum::from(Auth::user()->role_id)->name;
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Pelanggan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Welcome Card --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 mb-6">
                <h3 class="text-2xl font-bold text-gray-800">Halo, {{ Auth::user()->name }}! 👋</h3>
                <p class="mt-2 text-gray-600">Selamat datang di Sporthub. Booking lapangan olahraga favoritmu sekarang!</p>
            </div>

            {{-- Quick Actions --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <a href="{{ route('customer.booking.index') }}" class="bg-teal-500 hover:bg-teal-600 text-white rounded-xl p-6 shadow-lg transition">
                    <div class="flex items-center">
                        <span class="text-4xl mr-4">🎾</span>
                        <div>
                            <h4 class="text-xl font-bold">Booking Lapangan</h4>
                            <p class="text-teal-200 text-sm">Cari dan booking lapangan olahraga</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('customer.booking.mine') }}" class="bg-green-600 hover:bg-green-700 text-white rounded-xl p-6 shadow-lg transition">
                    <div class="flex items-center">
                        <span class="text-4xl mr-4">📋</span>
                        <div>
                            <h4 class="text-xl font-bold">Booking Saya</h4>
                            <p class="text-green-200 text-sm">Lihat status booking Anda</p>
                        </div>
                    </div>
                </a>
            </div>

            {{-- Recent Bookings --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Booking Terbaru</h3>
                @php
                    $recentBookings = \App\Models\Booking::where('user_id', Auth::id())
                        ->with(['field.gor'])
                        ->orderBy('created_at', 'desc')
                        ->take(5)
                        ->get();
                @endphp

                @if($recentBookings->count() > 0)
                    <div class="space-y-3">
                        @foreach($recentBookings as $booking)
                            <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                <div>
                                    <p class="font-medium text-gray-800">{{ $booking->field->nama ?? '-' }} - {{ $booking->field->gor->nama ?? '-' }}</p>
                                    <p class="text-sm text-gray-500">{{ $booking->tanggal->format('d M Y') }} • {{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}</p>
                                </div>
                                <span class="px-3 py-1 rounded-full text-xs font-medium
                                    @if($booking->status === 'approved') bg-green-100 text-green-800
                                    @elseif($booking->status === 'rejected') bg-red-100 text-red-800
                                    @elseif($booking->status === 'cancelled') bg-gray-100 text-gray-800
                                    @else bg-yellow-100 text-yellow-800 @endif">
                                    @if($booking->status === 'approved') ✅ Disetujui
                                    @elseif($booking->status === 'rejected') ❌ Ditolak
                                    @elseif($booking->status === 'cancelled') 🚫 Dibatalkan
                                    @else ⏳ Menunggu @endif
                                </span>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4 text-right">
                        <a href="{{ route('customer.booking.mine') }}" class="text-teal-600 hover:underline text-sm font-medium">
                            Lihat Semua Booking →
                        </a>
                    </div>
                @else
                    <div class="text-center py-8 text-gray-500">
                        <p class="text-4xl mb-2">📅</p>
                        <p>Belum ada booking</p>
                        <a href="{{ route('customer.booking.index') }}" class="mt-4 inline-block bg-teal-500 text-white px-4 py-2 rounded-lg text-sm">
                            Booking Sekarang
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
