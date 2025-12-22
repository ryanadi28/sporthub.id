<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_booking',
        'user_id',
        'field_id',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'total_harga',
        'bukti_transfer',
        'status',
        'catatan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($booking) {
            $booking->kode_booking = 'BK-' . strtoupper(uniqid());
        });
    }
}
