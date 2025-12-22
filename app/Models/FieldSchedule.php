<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'field_id',
        'hari',
        'jam_buka',
        'jam_tutup',
        'is_available',
    ];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    /**
     * Get all day labels as array
     */
    public static function hariLabels(): array
    {
        return [
            0 => 'Minggu',
            1 => 'Senin',
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => 'Jumat',
            6 => 'Sabtu',
        ];
    }

    /**
     * Get day label for specific day number
     */
    public static function hariLabel(int $hari): string
    {
        return self::hariLabels()[$hari] ?? '-';
    }
}
