<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah GOR</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('gors.store') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium">Nama</label>
                        <input type="text" name="nama" class="mt-1 w-full border rounded p-2" required />
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Alamat</label>
                        <input type="text" name="alamat" class="mt-1 w-full border rounded p-2" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Telepon</label>
                        <input type="text" name="telepon" class="mt-1 w-full border rounded p-2" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Deskripsi</label>
                        <textarea name="deskripsi" class="mt-1 w-full border rounded p-2"></textarea>
                    </div>
                    @if(auth()->user()->isAdminPlatform())
                        <div>
                            <label class="block text-sm font-medium">Owner (User ID)</label>
                            <input type="number" name="owner_user_id" class="mt-1 w-full border rounded p-2" />
                        </div>
                    @endif
                    <div>
                        <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
