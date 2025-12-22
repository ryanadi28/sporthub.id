<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Lapangan</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('gors.fields.update', [$gor, $field]) }}" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-sm font-medium">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama', $field->nama) }}" class="mt-1 w-full border rounded p-2" required />
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Tipe</label>
                        <input type="text" name="tipe" value="{{ old('tipe', $field->tipe) }}" class="mt-1 w-full border rounded p-2" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Harga per Jam</label>
                        <input type="number" name="harga_per_jam" value="{{ old('harga_per_jam', $field->harga_per_jam) }}" class="mt-1 w-full border rounded p-2" required />
                    </div>
                    <div>
                        <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
