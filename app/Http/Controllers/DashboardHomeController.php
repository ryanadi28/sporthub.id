<?php

namespace App\Http\Controllers;

use App\Enums\UserRolesEnum;
use App\Http\Controllers\AdminDashboardHomeController;
use Illuminate\Http\Request;

class DashboardHomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('home');
        }

        if ((int) $user->role_id === UserRolesEnum::Admin->value) {
            // Admin Platform ke dashboard platform
            return redirect()->route('dashboard.platform');
        }

        if ((int) $user->role_id === UserRolesEnum::GorAdmin->value) {
            // Admin GOR ke dashboard GOR
            return redirect()->route('dashboard.gor');
        }

        if ((int) $user->role_id === UserRolesEnum::Customer->value) {
            // Pelanggan langsung ke halaman booking
            return redirect()->route('customer.booking.index');
        }

        return redirect()->route('home')->with('error', 'You are not authorized to perform this action.');
    }
}
