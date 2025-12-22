<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Jadwal Lapangan: {{ $field->nama }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('message'))
                <div class="mb-4 bg-green-100 text-green-800 p-3 rounded">{{ session('message') }}</div>
            @endif

            <div class="flex justify-between mb-4">
                <a href="{{ route('gors.fields.index', $gor) }}" class="text-teal-600 underline">&larr; Kembali ke Daftar Lapangan</a>
                <a href="{{ route('gors.fields.schedules.create', [$gor, $field]) }}" class="bg-teal-500 text-white px-4 py-2 rounded">+ Tambah Jadwal</a>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="text-left">
                            <th class="py-2">Hari</th>
                            <th class="py-2">Jam Buka</th>
                            <th class="py-2">Jam Tutup</th>
                            <th class="py-2">Status</th>
                            <th class="py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($schedules as $s)
                        <tr class="border-t">
                            <td class="py-2">{{ \App\Models\FieldSchedule::hariLabels()[$s->hari] ?? $s->hari }}</td>
                            <td class="py-2">{{ $s->jam_buka }}</td>
                            <td class="py-2">{{ $s->jam_tutup }}</td>
                            <td class="py-2">
                                <span class="px-2 py-1 rounded text-xs {{ $s->is_available ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                                    {{ $s->is_available ? 'Tersedia' : 'Tidak Tersedia' }}
                                </span>
                            </td>
                            <td class="py-2 flex gap-2">
                                <a href="{{ route('gors.fields.schedules.edit', [$gor, $field, $s]) }}" class="text-teal-600 underline">Edit</a>
                                <form method="POST" action="{{ route('gors.fields.schedules.destroy', [$gor, $field, $s]) }}" onsubmit="return confirm('Hapus jadwal ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="py-4 text-center text-gray-500">Belum ada jadwal</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
