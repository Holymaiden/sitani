<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panen extends Model
{
    use HasFactory;

    protected $fillable = [
        'lahan_id',
        'masuk_id',
        'tanggal_tanam',
        'tanggal_panen',
        'jumlah_panen',
        'satuan_panen',
        'jumlah_gagal',
        'satuan_gagal',
        'keterangan',
        'gambar'
    ];

    public function lahan(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\Lahan', 'id', 'lahan_id');
    }

    public function lahanAnggota(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\Lahan', 'id', 'lahan_id')->with('anggota');
    }

    public function masuk(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\Masuk', 'id', 'masuk_id');
    }

    public function masukBantuan(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\Masuk', 'id', 'masuk_id')->with('bantuan');
    }
}
