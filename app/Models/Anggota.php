<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelompok_id',
        'nama',
        'status',
        'jenis_kelamin',
        'no_tlp',
        'alamat',
    ];

    public function kelompok(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\Kelompok', 'id', 'kelompok_id');
    }
}
