<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Gor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FieldController extends Controller
{
    public function index(Gor $gor)
    {
        $this->authorizeGor($gor);
        $fields = $gor->fields()->paginate(10);
        return view('dashboard.gor.fields.index', compact('gor', 'fields'));
    }

    public function create(Gor $gor)
    {
        $this->authorizeGor($gor);
        return view('dashboard.gor.fields.create', compact('gor'));
    }

    public function store(Request $request, Gor $gor)
    {
        $this->authorizeGor($gor);
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'nullable|string|max:100',
            'harga_per_jam' => 'required|numeric|min:0',
            'is_hidden' => 'boolean',
        ]);
        $data['is_hidden'] = $data['is_hidden'] ?? false;
        $gor->fields()->create($data);
        return redirect()->route('gors.fields.index', $gor)->with('message', 'Lapangan dibuat');
    }

    public function edit(Gor $gor, Field $field)
    {
        $this->authorizeGor($gor);
        $this->authorizeField($gor, $field);
        return view('dashboard.gor.fields.edit', compact('gor', 'field'));
    }

    public function update(Request $request, Gor $gor, Field $field)
    {
        $this->authorizeGor($gor);
        $this->authorizeField($gor, $field);
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'nullable|string|max:100',
            'harga_per_jam' => 'required|numeric|min:0',
            'is_hidden' => 'boolean',
        ]);
        $field->update($data);
        return redirect()->route('gors.fields.index', $gor)->with('message', 'Lapangan diperbarui');
    }

    public function destroy(Gor $gor, Field $field)
    {
        $this->authorizeGor($gor);
        $this->authorizeField($gor, $field);
        $field->delete();
        return redirect()->route('gors.fields.index', $gor)->with('message', 'Lapangan dihapus');
    }

    private function authorizeGor(Gor $gor): void
    {
        $user = Auth::user();
        if ($user->isAdminPlatform()) return;
        if ($gor->owner_user_id !== $user->id) abort(403);
    }

    private function authorizeField(Gor $gor, Field $field): void
    {
        if ($field->gor_id !== $gor->id) abort(404);
    }
}
