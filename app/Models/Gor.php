<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'alamat', 'telepon', 'deskripsi', 'owner_user_id', 'status',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_user_id');
    }

    public function fields()
    {
        return $this->hasMany(Field::class);
    }
}
