<?php

namespace App\Http\Controllers;

use App\Models\Gor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GorController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $gors = $user->isAdminPlatform() ? Gor::with('owner')->paginate(10) : $user->gors()->paginate(10);
        return view('dashboard.gor.index', compact('gors'));
    }

    public function create()
    {
        return view('dashboard.gor.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:50',
            'deskripsi' => 'nullable|string',
            'owner_user_id' => 'nullable|integer|exists:users,id',
            'status' => 'boolean',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = Auth::user();
        if (!$user->isAdminPlatform()) {
            $data['owner_user_id'] = $user->id;
        } else {
            $data['owner_user_id'] = $data['owner_user_id'] ?? $user->id;
        }
        $data['status'] = $data['status'] ?? true;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/gors', $filename);
            $data['gambar'] = $filename;
        }
        Gor::create($data);
        return redirect()->route('gors.index')->with('message', 'GOR berhasil dibuat');
    }

    public function edit(Gor $gor)
    {
        $this->authorizeAccess($gor);
        return view('dashboard.gor.edit', compact('gor'));
    }

    public function update(Request $request, Gor $gor)
    {
        $this->authorizeAccess($gor);
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:50',
            'deskripsi' => 'nullable|string',
            'status' => 'boolean',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/gors', $filename);
            $data['gambar'] = $filename;
        }
        $gor->update($data);
        return redirect()->route('gors.index')->with('message', 'GOR berhasil diperbarui');
    }

    public function destroy(Gor $gor)
    {
        $this->authorizeAccess($gor);
        $gor->delete();
        return redirect()->route('gors.index')->with('message', 'GOR dihapus');
    }

    public function dashboard()
    {
        $user = Auth::user();
        $gorIds = $user->gors()->pluck('id');
        $totalBookingToday = \App\Models\Booking::whereIn('field_id', \App\Models\Field::whereIn('gor_id', $gorIds)->pluck('id'))
            ->whereDate('tanggal', now())
            ->count();
        $totalBookingMonth = \App\Models\Booking::whereIn('field_id', \App\Models\Field::whereIn('gor_id', $gorIds)->pluck('id'))
            ->whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year)
            ->count();
        $totalLapangan = \App\Models\Field::whereIn('gor_id', $gorIds)->count();
        $activeBookings = \App\Models\Booking::whereIn('field_id', \App\Models\Field::whereIn('gor_id', $gorIds)->pluck('id'))
            ->where('status', 'active')
            ->orderBy('tanggal', 'desc')
            ->orderBy('jam_mulai')
            ->get();
        $recentBookings = \App\Models\Booking::whereIn('field_id', \App\Models\Field::whereIn('gor_id', $gorIds)->pluck('id'))
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
        return view('dashboard.gor.dashboard', compact('totalBookingToday', 'totalBookingMonth', 'totalLapangan', 'activeBookings', 'recentBookings'));
    }

    private function authorizeAccess(Gor $gor): void
    {
        $user = Auth::user();
        if ($user->isAdminPlatform()) {
            return;
        }
        if ($gor->owner_user_id !== $user->id) {
            abort(403);
        }
    }
}
