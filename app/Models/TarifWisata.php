<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarifWisata extends Model
{
    use HasFactory;

    protected $table = 'tarif_pariwisata';

    protected $fillable = [
        'mobil_id',
        'tarif_per_km',
    ];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }
}