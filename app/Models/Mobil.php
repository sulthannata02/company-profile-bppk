<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $table = 'mobils'; // sesuai tabel migration

    protected $fillable = [
        'nama_mobil',
        'tipe_mobil',
        'kapasitas',
        'transmisi',
        'deskripsi',
        'gambar',
    ];

}
