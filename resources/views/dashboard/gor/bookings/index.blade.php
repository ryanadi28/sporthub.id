<x-app-layout>
    <x-slot name="header">
        <!-- Simplified Header -->
        <div class="relative overflow-hidden bg-gradient-to-r from-slate-800 to-slate-900 py-6 px-6 rounded-xl shadow-lg">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-teal-500 rounded-xl flex items-center justify-center shadow-md">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-xl text-white">Kelola Booking</h2>
                    <p class="text-teal-300 text-sm">sporthub<span class="text-white">.id</span> - Admin GOR</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Success Message -->
            @if(session('message'))
                <div class="mb-4 bg-teal-50 border border-teal-200 rounded-lg p-3 flex items-center space-x-2">
                    <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-teal-800 text-sm font-medium">{{ session('message') }}</p>
                </div>
            @endif

            <!-- Bookings Table -->
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-slate-800 text-white">
                            <tr>
                                <th class="text-left py-3 px-4 font-semibold uppercase text-xs">Kode</th>
                                <th class="text-left py-3 px-4 font-semibold uppercase text-xs">Pelanggan</th>
                                <th class="text-left py-3 px-4 font-semibold uppercase text-xs">GOR / Lapangan</th>
                                <th class="text-left py-3 px-4 font-semibold uppercase text-xs">Tanggal</th>
                                <th class="text-left py-3 px-4 font-semibold uppercase text-xs">Jam</th>
                                <th class="text-left py-3 px-4 font-semibold uppercase text-xs">Total</th>
                                <th class="text-center py-3 px-4 font-semibold uppercase text-xs">Bukti</th>
                                <th class="text-center py-3 px-4 font-semibold uppercase text-xs">Status</th>
                                <th class="text-center py-3 px-4 font-semibold uppercase text-xs">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200">
                        @forelse($bookings as $b)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <!-- Kode Booking -->
                                <td class="py-3 px-4">
                                    <div class="flex items-center space-x-2">
                                        <div class="w-8 h-8 bg-teal-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                            </svg>
                                        </div>
                                        <span class="font-mono text-xs font-semibold text-slate-700">{{ $b->kode_booking }}</span>
                                    </div>
                                </td>

                                <!-- Pelanggan -->
                                <td class="py-3 px-4">
                                    <div class="flex items-center space-x-2">
                                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                        <span class="font-medium text-slate-700">{{ $b->user->name ?? '-' }}</span>
                                    </div>
                                </td>

                                <!-- GOR / Lapangan -->
                                <td class="py-3 px-4">
                                    <div class="flex items-center space-x-3">
                                        @if(isset($b->field->gor->gambar) && $b->field->gor->gambar)
                                            <img src="{{ asset('storage/gors/' . $b->field->gor->gambar) }}" alt="Gambar GOR" class="h-12 w-12 rounded-lg object-cover border border-slate-200" />
                                        @endif
                                        <div>
                                            <p class="font-semibold text-slate-800">{{ $b->field->gor->nama ?? '-' }}</p>
                                            <p class="text-xs text-teal-600 bg-teal-50 inline-block px-2 py-0.5 rounded mt-1">{{ $b->field->nama ?? '-' }}</p>
                                        </div>
                                    </div>
                                </td>

                                <!-- Tanggal -->
                                <td class="py-3 px-4">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <span class="text-slate-700 font-medium">{{ $b->tanggal->format('d M Y') }}</span>
                                    </div>
                                </td>

                                <!-- Jam -->
                                <td class="py-3 px-4">
                                    <div class="flex items-center space-x-1 text-xs">
                                        <span class="bg-slate-100 px-2 py-1 rounded font-mono text-slate-700">{{ $b->jam_mulai }}</span>
                                        <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                        </svg>
                                        <span class="bg-slate-100 px-2 py-1 rounded font-mono text-slate-700">{{ $b->jam_selesai }}</span>
                                    </div>
                                </td>

                                <!-- Total -->
                                <td class="py-3 px-4">
                                    <div class="text-teal-600 font-bold">
                                        Rp {{ number_format($b->total_harga, 0, ',', '.') }}
                                    </div>
                                </td>

                                <!-- Bukti Transfer -->
                                <td class="py-3 px-4 text-center">
                                    @if($b->bukti_transfer)
                                        <a href="{{ asset('storage/' . $b->bukti_transfer) }}"
                                           target="_blank"
                                           class="inline-flex items-center space-x-1 bg-teal-500 hover:bg-teal-600 text-white px-3 py-1.5 rounded-lg font-medium text-xs transition-colors">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            <span>Lihat</span>
                                        </a>
                                    @else
                                        <span class="text-slate-400 text-xs">-</span>
                                    @endif
                                </td>

                                <!-- Status -->
                                <td class="py-3 px-4 text-center">
                                    @if($b->status === 'approved')
                                        <span class="inline-flex items-center space-x-1 px-3 py-1 rounded-lg bg-teal-500 text-white font-semibold text-xs">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span>Approved</span>
                                        </span>
                                    @elseif($b->status === 'rejected')
                                        <span class="inline-flex items-center space-x-1 px-3 py-1 rounded-lg bg-red-500 text-white font-semibold text-xs">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                            <span>Rejected</span>
                                        </span>
                                    @elseif($b->status === 'cancelled')
                                        <span class="inline-flex items-center space-x-1 px-3 py-1 rounded-lg bg-slate-500 text-white font-semibold text-xs">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                                            </svg>
                                            <span>Cancelled</span>
                                        </span>
                                    @else
                                        <span class="inline-flex items-center space-x-1 px-3 py-1 rounded-lg bg-yellow-400 text-white font-semibold text-xs">
                                            <svg class="w-3 h-3 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span>Pending</span>
                                        </span>
                                    @endif
                                </td>

                                <!-- Aksi -->
                                <td class="py-3 px-4 text-center">
                                    @if($b->status === 'pending')
                                        <div class="flex items-center justify-center space-x-2">
                                            <form method="POST" action="{{ route('gor.bookings.approve', $b) }}" class="inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="inline-flex items-center space-x-1 bg-teal-500 hover:bg-teal-600 text-white px-3 py-1.5 rounded-lg font-medium text-xs transition-colors">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                    <span>Setujui</span>
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('gor.bookings.reject', $b) }}" class="inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="inline-flex items-center space-x-1 bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-lg font-medium text-xs transition-colors">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                    <span>Tolak</span>
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <span class="text-slate-400 text-xs">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <!-- Empty State -->
                            <tr>
                                <td colspan="9" class="py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mb-3">
                                            <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                            </svg>
                                        </div>
                                        <p class="text-slate-600 font-semibold">Belum Ada Booking</p>
                                        <p class="text-slate-500 text-sm mt-1">Booking akan muncul di sini</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($bookings->hasPages())
                    <div class="px-6 py-4 border-t border-slate-200 bg-slate-50">
                        {{ $bookings->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
