<x-app-layout>
    <x-slot name="header">
        <div class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-teal-900 to-slate-900 py-8 px-6 rounded-2xl shadow-2xl">
            <h2 class="font-bold text-3xl text-white leading-tight tracking-tight">Dashboard Admin GOR</h2>
            <p class="text-teal-300 text-sm mt-1 font-medium">Rekap Booking & Statistik</p>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 to-teal-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistik Card -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
                    <div class="text-2xl font-bold text-teal-600">{{ $totalBookingToday }}</div>
                    <div class="text-sm text-gray-500">Booking Hari Ini</div>
                </div>
                <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
                    <div class="text-2xl font-bold text-teal-600">{{ $totalBookingMonth }}</div>
                    <div class="text-sm text-gray-500">Booking Bulan Ini</div>
                </div>
                <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
                    <div class="text-2xl font-bold text-teal-600">{{ $totalLapangan }}</div>
                    <div class="text-sm text-gray-500">Total Lapangan</div>
                </div>
            </div>

            <!-- Lapangan Sedang Dibooking -->
            <div class="mb-8">
                <h3 class="text-lg font-bold text-teal-700 mb-4">Lapangan Sedang Dibooking</h3>
                <div class="bg-white rounded-xl shadow p-4">
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="bg-teal-100">
                                <th class="py-2 px-4 text-left">Nama Lapangan</th>
                                <th class="py-2 px-4 text-left">Jam</th>
                                <th class="py-2 px-4 text-left">User</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($activeBookings as $booking)
                                <tr>
                                    <td class="py-2 px-4">{{ $booking->field->nama }}</td>
                                    <td class="py-2 px-4">{{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}</td>
                                    <td class="py-2 px-4">{{ $booking->user->name }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="py-2 px-4 text-center text-gray-400">Tidak ada booking aktif</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Booking Terbaru -->
            <div>
                <h3 class="text-lg font-bold text-teal-700 mb-4">Booking Terbaru</h3>
                <div class="bg-white rounded-xl shadow p-4">
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="bg-teal-100">
                                <th class="py-2 px-4 text-left">Kode</th>
                                <th class="py-2 px-4 text-left">Lapangan</th>
                                <th class="py-2 px-4 text-left">User</th>
                                <th class="py-2 px-4 text-left">Tanggal</th>
                                <th class="py-2 px-4 text-left">Jam</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentBookings as $booking)
                                <tr>
                                    <td class="py-2 px-4">{{ $booking->kode_booking }}</td>
                                    <td class="py-2 px-4">{{ $booking->field->nama }}</td>
                                    <td class="py-2 px-4">{{ $booking->user->name }}</td>
                                    <td class="py-2 px-4">{{ $booking->tanggal->format('d M Y') }}</td>
                                    <td class="py-2 px-4">{{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="py-2 px-4 text-center text-gray-400">Belum ada booking</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
