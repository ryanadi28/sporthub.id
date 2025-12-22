<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Enums\UserRolesEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect to Google OAuth
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google callback
     */
    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Cek apakah user sudah ada berdasarkan google_id
            $user = User::where('google_id', $googleUser->getId())->first();

            if ($user) {
                // User sudah pernah login dengan Google, update avatar jika berubah
                $user->update([
                    'google_avatar' => $googleUser->getAvatar(),
                ]);

                Auth::login($user, true);
                return redirect()->intended('/dashboard');
            }

            // Cek apakah email sudah terdaftar
            $existingUser = User::where('email', $googleUser->getEmail())->first();

            if ($existingUser) {
                // Email sudah ada, hubungkan dengan Google
                $existingUser->update([
                    'google_id' => $googleUser->getId(),
                    'google_avatar' => $googleUser->getAvatar(),
                ]);

                Auth::login($existingUser, true);
                return redirect()->intended('/dashboard');
            }

            // Buat user baru
            $newUser = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'google_avatar' => $googleUser->getAvatar(),
                'email_verified_at' => now(), // Sudah terverifikasi via Google
                'password' => Hash::make(Str::random(24)), // Random password
                'role_id' => UserRolesEnum::Customer->value, // Default sebagai Customer
                'status' => 1,
            ]);

            Auth::login($newUser, true);

            return redirect()->intended('/dashboard');

        } catch (\Exception $e) {
            \Log::error('Google Login Error: ' . $e->getMessage(), [
                'exception' => $e,
                'trace' => $e->getTraceAsString(),
                'request' => request()->all(),
            ]);
            return redirect()->route('login')->with('errormsg', 'Gagal login dengan Google. Silakan coba lagi.');
        }
    }
}
