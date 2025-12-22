<?php

namespace App\Http\Controllers;

use App\Enums\UserRolesEnum;
use App\Models\User;
use App\Models\Gor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PlatformGorAdminController extends Controller
{
    public function index()
    {
        $gorAdmins = User::where('role_id', UserRolesEnum::GorAdmin->value)
            ->with('gors')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('dashboard.platform.index', compact('gorAdmins'));
    }

    public function create()
    {
        return view('dashboard.platform.gor_admin_create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone_number' => 'nullable|string|max:20',
            'password' => 'required|string|min:6',
            'gor_nama' => 'required|string|max:255',
            'gor_alamat' => 'nullable|string|max:255',
            'gor_telepon' => 'nullable|string|max:50',
            'gor_deskripsi' => 'nullable|string',
        ]);

        $admin = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'] ?? null,
            'password' => Hash::make($data['password']),
            'role_id' => UserRolesEnum::GorAdmin->value,
        ]);

        Gor::create([
            'nama' => $data['gor_nama'],
            'alamat' => $data['gor_alamat'] ?? null,
            'telepon' => $data['gor_telepon'] ?? null,
            'deskripsi' => $data['gor_deskripsi'] ?? null,
            'owner_user_id' => $admin->id,
            'status' => true,
        ]);

        return redirect()->route('dashboard.platform')->with('message', 'Admin GOR dan GOR berhasil dibuat');
    }

    public function edit(User $user)
    {
        if ($user->role_id !== UserRolesEnum::GorAdmin->value) {
            abort(404);
        }
        return view('dashboard.platform.gor_admin_edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if ($user->role_id !== UserRolesEnum::GorAdmin->value) {
            abort(404);
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'nullable|string|max:20',
        ]);

        $user->update($data);

        return redirect()->route('dashboard.platform')->with('message', 'Admin GOR berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        if ($user->role_id !== UserRolesEnum::GorAdmin->value) {
            abort(404);
        }

        // Delete associated GORs first
        $user->gors()->delete();
        $user->delete();

        return redirect()->route('dashboard.platform')->with('message', 'Admin GOR berhasil dihapus');
    }

    public function resetPassword(Request $request, User $user)
    {
        if ($user->role_id !== UserRolesEnum::GorAdmin->value) {
            abort(404);
        }

        $data = $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user->update([
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('dashboard.platform')->with('message', 'Password berhasil direset');
    }
}
