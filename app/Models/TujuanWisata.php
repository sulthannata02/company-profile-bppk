<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TujuanWisata extends Model
{
    use HasFactory;

    protected $table = 'tujuan_wisata';

    protected $fillable = [
        'nama_tujuan',
        'jarak_km',
    ];
}