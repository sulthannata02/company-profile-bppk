<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\TarifWisata;
use App\Models\TujuanWisata;
use Illuminate\Http\Request;

class EstimasiController extends Controller
{
    /**
     * Load data form estimasi
     */
    public function index()
    {
        return view('estimasi.estimasi-harga-pariwisata', [
            'mobils' => Mobil::all(),
            'tujuans' => TujuanWisata::all(),
        ]);
    }

    /**
     * Proses hitung estimasi harga
     */
    public function hitung(Request $request)
    {
        // 1. VALIDASI
        $request->validate([
            'mobil_id' => 'required|exists:mobils,id',
            'tujuan_id' => 'required|exists:tujuan_wisatas,id',
        ]);

        // 2. AMBIL DATA MOBIL & TUJUAN
        $mobil = Mobil::findOrFail($request->mobil_id);
        $tujuan = TujuanWisata::findOrFail($request->tujuan_id);

        // 3. AMBIL TARIF MOBIL
        $tarif = TarifWisata::where('mobil_id', $mobil->id)->first();

        // 4. HANDLE JIKA TARIF TIDAK ADA
        if (!$tarif) {
            return back()
                ->withInput()
                ->with('error', 'Tarif mobil belum tersedia.');
        }

        // 5. HITUNG HARGA
        $harga = round($tarif->tarif_per_km * $tujuan->jarak_km);

        // 6. RELOAD DATA UNTUK VIEW
        return view('estimasi.estimasi-harga-pariwisata', [
            'mobils' => Mobil::all(),
            'tujuans' => TujuanWisata::all(),
            'mobil' => $mobil,
            'tujuan' => $tujuan,
            'harga' => $harga,
        ]);
    }
}