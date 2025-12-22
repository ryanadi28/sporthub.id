<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Sporthub</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-6xl mx-auto py-8 px-4">
        {{-- Header --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-teal-600">Admin Sporthub</h1>
                <p class="text-gray-500">Kelola Admin GOR</p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-red-600 hover:underline">Logout</button>
            </form>
        </div>

        {{-- Flash Messages --}}
        @if(session('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        {{-- Add Admin GOR Button --}}
        <div class="mb-6">
            <a href="{{ route('platform.gor-admins.create') }}" class="inline-flex items-center bg-teal-500 text-white px-4 py-2 rounded hover:bg-teal-600">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Tambah Admin GOR
            </a>
        </div>

        {{-- Admin GOR List --}}
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telepon</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">GOR</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($gorAdmins as $admin)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-medium text-gray-900">{{ $admin->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{ $admin->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{ $admin->phone_number ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                @if($admin->gors->count() > 0)
                                    {{ $admin->gors->pluck('nama')->join(', ') }}
                                @else
                                    <span class="text-gray-400">Belum ada GOR</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <div class="flex gap-2">
                                    <a href="{{ route('platform.gor-admins.edit', $admin) }}" class="text-teal-600 hover:underline">Edit</a>
                                    <button type="button" onclick="showResetModal({{ $admin->id }}, '{{ $admin->name }}')" class="text-yellow-600 hover:underline">Reset Password</button>
                                    <form method="POST" action="{{ route('platform.gor-admins.destroy', $admin) }}" onsubmit="return confirm('Hapus Admin GOR ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada Admin GOR</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($gorAdmins->hasPages())
            <div class="mt-4">
                {{ $gorAdmins->links() }}
            </div>
        @endif
    </div>

    {{-- Reset Password Modal --}}
    <div id="resetModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 w-96">
            <h3 class="text-lg font-bold mb-4">Reset Password</h3>
            <p class="text-gray-600 mb-4">Reset password untuk: <strong id="resetAdminName"></strong></p>
            <form method="POST" id="resetForm" action="">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Password Baru</label>
                    <input type="password" name="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required minlength="8" />
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required minlength="8" />
                </div>
                <div class="flex justify-end gap-3">
                    <button type="button" onclick="hideResetModal()" class="text-gray-600">Batal</button>
                    <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded">Reset Password</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showResetModal(id, name) {
            document.getElementById('resetModal').classList.remove('hidden');
            document.getElementById('resetModal').classList.add('flex');
            document.getElementById('resetAdminName').textContent = name;
            document.getElementById('resetForm').action = '/dashboard/platform/gor-admins/' + id + '/reset-password';
        }
        function hideResetModal() {
            document.getElementById('resetModal').classList.add('hidden');
            document.getElementById('resetModal').classList.remove('flex');
        }
    </script>
</body>
</html>
