<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    protected $table = 'rute';

    protected $fillable = [
        'nama_lokasi',
        'tipe',
        'latitude',
        'longitude',
    ];
}
