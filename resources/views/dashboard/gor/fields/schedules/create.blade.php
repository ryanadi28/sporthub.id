<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Jadwal - {{ $field->nama }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('gors.fields.schedules.store', [$gor, $field]) }}">
                    @csrf

                    {{-- Pilihan Mode --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-3">Pilih Mode Jadwal</label>
                        <div class="space-y-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="mode" value="setiap_hari" class="text-teal-600" checked onchange="toggleMode(this.value)" />
                                <span class="ml-2 text-sm text-gray-700">Buka Setiap Hari (jam sama)</span>
                            </label>
                            <br>
                            <label class="inline-flex items-center">
                                <input type="radio" name="mode" value="pilih_hari" class="text-teal-600" onchange="toggleMode(this.value)" />
                                <span class="ml-2 text-sm text-gray-700">Pilih Hari Tertentu</span>
                            </label>
                        </div>
                    </div>

                    {{-- Pilih Hari (hidden by default) --}}
                    <div id="pilihHariSection" class="mb-4 hidden">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Hari</label>
                        <div class="grid grid-cols-2 gap-2">
                            @foreach(\App\Models\FieldSchedule::hariLabels() as $idx => $label)
                                <label class="inline-flex items-center bg-gray-50 p-2 rounded">
                                    <input type="checkbox" name="hari_multiple[]" value="{{ $idx }}" class="rounded border-gray-300 text-teal-600 shadow-sm" />
                                    <span class="ml-2 text-sm text-gray-700">{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('hari_multiple') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jam Buka</label>
                            <input type="time" name="jam_buka" value="{{ old('jam_buka', '08:00') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                            @error('jam_buka') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Jam Tutup</label>
                            <input type="time" name="jam_tutup" value="{{ old('jam_tutup', '22:00') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                            @error('jam_tutup') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="is_available" value="1" class="rounded border-gray-300 text-teal-600 shadow-sm" checked />
                            <span class="ml-2 text-sm text-gray-700">Tersedia</span>
                        </label>
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('gors.fields.schedules.index', [$gor, $field]) }}" class="text-gray-600 underline">Batal</a>
                        <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function toggleMode(mode) {
            const pilihHariSection = document.getElementById('pilihHariSection');
            if (mode === 'pilih_hari') {
                pilihHariSection.classList.remove('hidden');
            } else {
                pilihHariSection.classList.add('hidden');
            }
        }
    </script>
    @endpush
</x-app-layout>
