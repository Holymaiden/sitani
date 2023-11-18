<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyuluh extends Model
{
    use HasFactory;

    protected $fillable = [
        'desa_id',
        'nama',
        'jenis_kelamin',
        'hp',
        'alamat',
    ];

    public function desa(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\Desa', 'id', 'desa_id');
    }
}
