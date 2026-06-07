<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $table = 'mobils';

    protected $fillable = [
        'nama_mobil',
        'tipe_mobil',
        'kapasitas',
        'transmisi',
        'deskripsi',
        'gambar',
    ];

    public function tarifPariwisata()
    {
        return $this->hasOne(TarifWisata::class);
    }
}