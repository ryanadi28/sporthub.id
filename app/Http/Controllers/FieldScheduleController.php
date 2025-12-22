<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\FieldSchedule;
use App\Models\Gor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FieldScheduleController extends Controller
{
    public function index(Gor $gor, Field $field)
    {
        $this->authorizeField($gor, $field);
        $schedules = $field->schedules()->orderBy('hari')->get();
        return view('dashboard.gor.fields.schedules.index', compact('gor', 'field', 'schedules'));
    }

    public function create(Gor $gor, Field $field)
    {
        $this->authorizeField($gor, $field);
        return view('dashboard.gor.fields.schedules.create', compact('gor', 'field'));
    }

    public function store(Request $request, Gor $gor, Field $field)
    {
        $this->authorizeField($gor, $field);

        $mode = $request->input('mode', 'setiap_hari');

        $request->validate([
            'jam_buka' => 'required|date_format:H:i',
            'jam_tutup' => 'required|date_format:H:i|after:jam_buka',
            'is_available' => 'boolean',
        ]);

        $isAvailable = $request->has('is_available');
        $jamBuka = $request->input('jam_buka');
        $jamTutup = $request->input('jam_tutup');

        if ($mode === 'setiap_hari') {
            // Buat jadwal untuk semua hari (0-6)
            for ($hari = 0; $hari <= 6; $hari++) {
                $field->schedules()->updateOrCreate(
                    ['hari' => $hari],
                    [
                        'jam_buka' => $jamBuka,
                        'jam_tutup' => $jamTutup,
                        'is_available' => $isAvailable,
                    ]
                );
            }
            return redirect()->route('gors.fields.schedules.index', [$gor, $field])->with('message', 'Jadwal untuk semua hari berhasil ditambahkan');
        } else {
            // Pilih hari tertentu
            $request->validate([
                'hari_multiple' => 'required|array|min:1',
                'hari_multiple.*' => 'integer|min:0|max:6',
            ]);

            foreach ($request->input('hari_multiple') as $hari) {
                $field->schedules()->updateOrCreate(
                    ['hari' => $hari],
                    [
                        'jam_buka' => $jamBuka,
                        'jam_tutup' => $jamTutup,
                        'is_available' => $isAvailable,
                    ]
                );
            }
            return redirect()->route('gors.fields.schedules.index', [$gor, $field])->with('message', 'Jadwal berhasil ditambahkan');
        }
    }

    public function edit(Gor $gor, Field $field, FieldSchedule $schedule)
    {
        $this->authorizeField($gor, $field);
        return view('dashboard.gor.fields.schedules.edit', compact('gor', 'field', 'schedule'));
    }

    public function update(Request $request, Gor $gor, Field $field, FieldSchedule $schedule)
    {
        $this->authorizeField($gor, $field);
        $data = $request->validate([
            'hari' => 'required|integer|min:0|max:6',
            'jam_buka' => 'required|date_format:H:i',
            'jam_tutup' => 'required|date_format:H:i|after:jam_buka',
            'is_available' => 'boolean',
        ]);
        $schedule->update($data);
        return redirect()->route('gors.fields.schedules.index', [$gor, $field])->with('message', 'Jadwal diperbarui');
    }

    public function destroy(Gor $gor, Field $field, FieldSchedule $schedule)
    {
        $this->authorizeField($gor, $field);
        $schedule->delete();
        return redirect()->route('gors.fields.schedules.index', [$gor, $field])->with('message', 'Jadwal dihapus');
    }

    private function authorizeField(Gor $gor, Field $field): void
    {
        $user = Auth::user();
        if ($user->isAdminPlatform()) return;
        if ($gor->owner_user_id !== $user->id) abort(403);
        if ($field->gor_id !== $gor->id) abort(404);
    }
}
