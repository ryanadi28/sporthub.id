<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable = [
        'gor_id', 'nama', 'tipe', 'harga_per_jam', 'is_hidden',
    ];

    /**
     * Accessor jenis sebagai alias dari tipe
     */
    public function getJenisAttribute()
    {
        return $this->tipe;
    }

    public function gor()
    {
        return $this->belongsTo(Gor::class);
    }

    public function schedules()
    {
        return $this->hasMany(FieldSchedule::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
