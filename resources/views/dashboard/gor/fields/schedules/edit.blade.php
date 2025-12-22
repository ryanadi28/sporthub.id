<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Jadwal - {{ $field->nama }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('gors.fields.schedules.update', [$gor, $field, $schedule]) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Hari</label>
                        <select name="hari" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                            @foreach(\App\Models\FieldSchedule::hariLabels() as $idx => $label)
                                <option value="{{ $idx }}" {{ old('hari', $schedule->hari) == $idx ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('hari') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Jam Buka</label>
                        <input type="time" name="jam_buka" value="{{ old('jam_buka', $schedule->jam_buka) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                        @error('jam_buka') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Jam Tutup</label>
                        <input type="time" name="jam_tutup" value="{{ old('jam_tutup', $schedule->jam_tutup) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                        @error('jam_tutup') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="is_available" value="1" class="rounded border-gray-300 text-teal-600 shadow-sm" {{ $schedule->is_available ? 'checked' : '' }} />
                            <span class="ml-2 text-sm text-gray-700">Tersedia</span>
                        </label>
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('gors.fields.schedules.index', [$gor, $field]) }}" class="text-gray-600 underline">Batal</a>
                        <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
