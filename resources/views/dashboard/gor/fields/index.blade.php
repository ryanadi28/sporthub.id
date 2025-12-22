<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Lapangan di {{ $gor->nama }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <a href="{{ route('gors.fields.create', $gor) }}" class="inline-block bg-teal-500 text-white px-4 py-2 rounded">Tambah Lapangan</a>
                <div class="mt-6">
                    <table class="min-w-full text-sm">
                        <thead><tr><th class="text-left">Nama</th><th>Tipe</th><th>Harga/Jam</th><th>Aksi</th></tr></thead>
                        <tbody>
                        @foreach($fields as $field)
                            <tr class="border-t">
                                <td class="py-2">{{ $field->nama }}</td>
                                <td class="py-2">{{ $field->tipe }}</td>
                                <td class="py-2">Rp {{ number_format($field->harga_per_jam, 0, ',', '.') }}</td>
                                <td class="py-2 flex gap-2">
                                    <a class="text-green-600" href="{{ route('gors.fields.schedules.index', [$gor, $field]) }}">Jadwal</a>
                                    <a class="text-teal-600" href="{{ route('gors.fields.edit', [$gor, $field]) }}">Edit</a>
                                    <form method="POST" action="{{ route('gors.fields.destroy', [$gor, $field]) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">{{ $fields->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
