<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'bantuan_id',
        'tanggal',
        'jumlah',
        'satuan',
        'pemberi',
        'gambar',
    ];

    public function bantuan(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\Models\Bantuan', 'id', 'bantuan_id');
    }
}
