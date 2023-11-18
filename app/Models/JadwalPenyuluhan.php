<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPenyuluhan extends Model
{
    use HasFactory;

    protected $table = 'jadwal_penyuluhans';
    protected $fillable = [
        'penyuluh_id',
        'tanggal',
        'waktu',
        'tempat',
        'keterangan',
    ];

    public function penyuluh(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\Penyuluh', 'id', 'penyuluh_id');
    }
}
