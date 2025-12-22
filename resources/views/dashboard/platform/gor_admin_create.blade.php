<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tambah Admin GOR - Sporthub</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-xl mx-auto py-8 px-4">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold text-teal-600">Tambah Admin GOR</h1>
            <a href="{{ route('dashboard.platform') }}" class="text-gray-600 hover:underline">&larr; Kembali</a>
        </div>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-lg shadow p-6">
            <form method="POST" action="{{ route('platform.gor-admins.store') }}" class="space-y-4">
                @csrf

                <h3 class="font-semibold text-lg border-b pb-2">Data Admin</h3>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama Admin</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="mt-1 w-full border border-gray-300 rounded p-2" required />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="mt-1 w-full border border-gray-300 rounded p-2" required />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                    <input type="text" name="phone_number" value="{{ old('phone_number') }}" class="mt-1 w-full border border-gray-300 rounded p-2" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" class="mt-1 w-full border border-gray-300 rounded p-2" required minlength="6" />
                </div>

                <h3 class="font-semibold text-lg border-b pb-2 pt-4">Data GOR</h3>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama GOR</label>
                    <input type="text" name="gor_nama" value="{{ old('gor_nama') }}" class="mt-1 w-full border border-gray-300 rounded p-2" required />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Alamat</label>
                    <input type="text" name="gor_alamat" value="{{ old('gor_alamat') }}" class="mt-1 w-full border border-gray-300 rounded p-2" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Telepon GOR</label>
                    <input type="text" name="gor_telepon" value="{{ old('gor_telepon') }}" class="mt-1 w-full border border-gray-300 rounded p-2" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="gor_deskripsi" class="mt-1 w-full border border-gray-300 rounded p-2" rows="3">{{ old('gor_deskripsi') }}</textarea>
                </div>

                <div class="flex justify-end gap-3 pt-4">
                    <a href="{{ route('dashboard.platform') }}" class="text-gray-600 py-2 px-4">Batal</a>
                    <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded hover:bg-teal-600">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
