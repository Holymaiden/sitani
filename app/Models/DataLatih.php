<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLatih extends Model
{
    use HasFactory;

    protected $table = 'data_latih';
    protected $fillable = [
        'cuaca',
        'luas_lahan',
        'pupuk_urea',
        'pupuk_npk',
        'komoditas',
    ];
}
