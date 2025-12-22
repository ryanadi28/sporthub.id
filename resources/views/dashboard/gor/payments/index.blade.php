<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Approve Pembayaran Booking</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <table class="min-w-full text-sm">
                    <thead><tr><th>Kode</th><th>Tanggal</th><th>Pengguna</th><th>Total</th><th>Status</th><th>Aksi</th></tr></thead>
                    <tbody>
                    @foreach($appointments as $a)
                        <tr class="border-t">
                            <td class="py-2">{{ $a->appointment_code }}</td>
                            <td class="py-2">{{ $a->date }}</td>
                            <td class="py-2">{{ optional($a->user)->name }}</td>
                            <td class="py-2">Rp {{ number_format($a->total, 0, ',', '.') }}</td>
                            <td class="py-2">{{ $a->is_paid ? 'Paid' : 'Pending' }}</td>
                            <td class="py-2">
                                @if(!$a->is_paid)
                                    <form method="POST" action="{{ route('gor.payments.approve', $a) }}" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded">Approve</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-4">{{ $appointments->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
