<x-app-layout>
    <x-slot name="header">
        <div class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-teal-900 to-slate-900 py-8 px-6 rounded-2xl shadow-2xl">
            <!-- Animated Background Elements -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute w-96 h-96 -top-48 -left-48 bg-teal-500/20 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute w-96 h-96 -bottom-48 -right-48 bg-teal-400/20 rounded-full blur-3xl animate-pulse delay-1000"></div>
            </div>

            <div class="relative flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <!-- Animated Logo -->
                    <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-lg transform hover:scale-110 hover:rotate-12 transition-all duration-500 animate-bounce-slow">
                        <svg class="w-10 h-10 text-teal-500" viewBox="0 0 100 100" fill="none">
                            <circle cx="50" cy="50" r="35" stroke="currentColor" stroke-width="4"/>
                            <circle cx="50" cy="50" r="20" stroke="currentColor" stroke-width="3"/>
                            <path d="M35 50 L45 60 L65 40" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" class="animate-pulse"/>
                            <path d="M50 70 L50 85" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="font-bold text-3xl text-white leading-tight tracking-tight animate-fade-in-down">
                            Dashboard Admin GOR
                        </h2>
                        <p class="text-teal-300 text-sm mt-1 font-medium animate-fade-in-up">sporthub<span class="text-white">.id</span> - Kelola Venue Olahraga Anda</p>
                    </div>
                </div>

                <!-- Stats Counter with Animation -->
                <div class="hidden md:flex space-x-6">
                    <div class="text-center bg-white/10 backdrop-blur-md px-6 py-3 rounded-xl border border-white/20 hover:bg-white/20 transition-all duration-300 transform hover:scale-105">
                        <div class="text-3xl font-bold text-teal-300 animate-count-up">{{ $gors->total() ?? 0 }}</div>
                        <div class="text-xs text-white/80">Total GOR</div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-slate-50 to-teal-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Main Card with Glass Effect -->
            <div class="bg-white/80 backdrop-blur-xl overflow-hidden shadow-2xl rounded-3xl border border-white/50 transform hover:shadow-teal-500/20 transition-all duration-500 animate-fade-in-up">
                <div class="p-8">
                    <!-- Header Section -->
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-teal-600 rounded-2xl flex items-center justify-center shadow-lg transform hover:rotate-12 transition-all duration-300">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-slate-800">Manajemen GOR</h3>
                                <p class="text-slate-500 text-sm">Kelola data GOR dan lapangan Anda dengan mudah</p>
                            </div>
                        </div>

                        <!-- Animated Add Button -->
                        <a href="{{ route('gors.create') }}" class="group relative inline-flex items-center space-x-2 bg-gradient-to-r from-teal-500 to-teal-600 text-white px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-teal-500/50 transform hover:scale-105 hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                            <span class="absolute inset-0 bg-white/20 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                            <svg class="w-5 h-5 relative z-10 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            <span class="relative z-10">Tambah GOR</span>
                        </a>
                    </div>

                    @isset($gors)
                        <!-- Modern Table with Animations -->
                        <div class="mt-8 overflow-hidden rounded-2xl border border-slate-200 shadow-xl">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gradient-to-r from-slate-800 to-slate-900">
                                    <tr>
                                        <th class="text-left py-4 px-6 text-white font-semibold text-sm uppercase tracking-wider">
                                            <div class="flex items-center space-x-2">
                                                <span class="w-2 h-2 bg-teal-400 rounded-full animate-ping"></span>
                                                <span class="w-2 h-2 bg-teal-400 rounded-full -ml-2"></span>
                                                <span class="ml-2">Nama GOR</span>
                                            </div>
                                        </th>
                                        <th class="text-center py-4 px-6 text-white font-semibold text-sm uppercase tracking-wider">Lapangan</th>
                                        <th class="text-center py-4 px-6 text-white font-semibold text-sm uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-200">
                                    @foreach($gors as $index => $gor)
                                        <tr class="group hover:bg-gradient-to-r hover:from-teal-50 hover:to-transparent transition-all duration-300 transform hover:scale-[1.01] animate-fade-in-up" style="animation-delay: {{ $index * 50 }}ms">
                                            <!-- GOR Name -->
                                            <td class="py-5 px-6">
                                                <div class="flex items-center space-x-4">
                                                    <div class="w-10 h-10 bg-gradient-to-br from-teal-400 to-teal-500 rounded-xl flex items-center justify-center text-white font-bold shadow-lg transform group-hover:rotate-6 transition-all duration-300">
                                                        {{ strtoupper(substr($gor->nama, 0, 1)) }}
                                                    </div>
                                                    <div>
                                                        <div class="font-semibold text-slate-800 text-base group-hover:text-teal-600 transition-colors duration-300">
                                                            {{ $gor->nama }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <!-- Lapangan Link -->
                                            <td class="py-5 px-6 text-center">
                                                <a href="{{ route('gors.fields.index', $gor) }}" class="inline-flex items-center space-x-2 text-teal-600 hover:text-teal-700 font-medium px-4 py-2 rounded-lg hover:bg-teal-50 transition-all duration-300 transform hover:scale-105">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                                                    </svg>
                                                    <span>Kelola Lapangan</span>
                                                </a>
                                            </td>

                                            <!-- Actions -->
                                            <td class="py-5 px-6">
                                                <div class="flex items-center justify-center space-x-3">
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('gors.edit', $gor) }}" class="group/edit inline-flex items-center space-x-1 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-all duration-300 transform hover:scale-110 hover:-translate-y-1 shadow-md hover:shadow-blue-500/50">
                                                        <svg class="w-4 h-4 group-hover/edit:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                        <span class="text-sm font-medium">Edit</span>
                                                    </a>

                                                    <!-- Delete Button -->
                                                    <form method="POST" action="{{ route('gors.destroy', $gor) }}" class="inline" onsubmit="return confirm('Yakin ingin menghapus GOR ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="group/delete inline-flex items-center space-x-1 bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-all duration-300 transform hover:scale-110 hover:-translate-y-1 shadow-md hover:shadow-red-500/50">
                                                            <svg class="w-4 h-4 group-hover/delete:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                            </svg>
                                                            <span class="text-sm font-medium">Hapus</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination with Animation -->
                        <div class="mt-8 flex justify-center animate-fade-in-up">
                            <div class="bg-white rounded-2xl shadow-lg p-2 border border-slate-200">
                                {{ $gors->links() }}
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Animations CSS -->
    <style>
        @keyframes fade-in-down {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .animate-fade-in-down { animation: fade-in-down 0.6s ease-out; }
        .animate-fade-in-up { animation: fade-in-up 0.6s ease-out; }
        .animate-bounce-slow { animation: bounce-slow 3s ease-in-out infinite; }
        .delay-1000 { animation-delay: 1s; }

        @keyframes count-up {
            from { opacity: 0; transform: scale(0.5); }
            to { opacity: 1; transform: scale(1); }
        }

        .animate-count-up { animation: count-up 0.8s cubic-bezier(0.34, 1.56, 0.64, 1); }
    </style>
</x-app-layout>
