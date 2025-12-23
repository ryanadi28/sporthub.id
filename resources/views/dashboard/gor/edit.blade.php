<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit GOR</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('gors.update', $gor) }}" class="space-y-4" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-sm font-medium">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama', $gor->nama) }}" class="mt-1 w-full border rounded p-2" required />
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Alamat</label>
                        <input type="text" name="alamat" value="{{ old('alamat', $gor->alamat) }}" class="mt-1 w-full border rounded p-2" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Telepon</label>
                        <input type="text" name="telepon" value="{{ old('telepon', $gor->telepon) }}" class="mt-1 w-full border rounded p-2" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Deskripsi</label>
                        <textarea name="deskripsi" class="mt-1 w-full border rounded p-2">{{ old('deskripsi', $gor->deskripsi) }}</textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Gambar GOR</label>
                        <input type="file" name="gambar" accept="image/*" class="mt-1 w-full border rounded p-2" />
                        @if($gor->gambar)
                            <img src="{{ asset('storage/gors/' . $gor->gambar) }}" alt="Gambar GOR" class="mt-2 h-24 rounded" />
                        @endif
                    </div>
                    <div>
                        <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
