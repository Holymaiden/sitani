<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'anggota_id',
        'luas_lahan',
        'satuan_lahan',
        'jenis_lahan',
        'pupuk',
    ];

    public function anggota(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\Anggota', 'id', 'anggota_id');
    }
}
