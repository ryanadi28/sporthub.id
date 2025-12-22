<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Enums\UserRolesEnum;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'role_id',
        'status',
        'google_id',
        'google_avatar',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    function role() {
        return $this->belongsTo(Role::class);
    }

    function cart() {
        return $this->hasOne(Cart::class);
    }

    // Relasi: sebagai pemilik GOR
    function gors() {
        return $this->hasMany(Gor::class, 'owner_user_id');
    }

    // Helper peran
    public function isAdminPlatform(): bool
    {
        return (int) $this->role_id === UserRolesEnum::Admin->value;
    }

    public function isGorAdmin(): bool
    {
        return (int) $this->role_id === UserRolesEnum::GorAdmin->value;
    }

    public function isCustomer(): bool
    {
        return (int) $this->role_id === UserRolesEnum::Customer->value;
    }
}

