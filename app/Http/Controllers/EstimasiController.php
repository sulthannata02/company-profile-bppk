<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Rute;
use App\Helpers\DistanceHelper;
use Illuminate\Http\Request;

class EstimasiController extends Controller
{
    /**
     * Menampilkan form estimasi biaya
     */
    public function create($mobilId)
    {
        $mobil = Mobil::findOrFail($mobilId);

        $lokasiJemput = Rute::whereIn('tipe', ['jemput', 'keduanya'])->get();
        $lokasiTujuan = Rute::whereIn('tipe', ['tujuan', 'keduanya'])->get();

        return view('estimasi.create', compact(
            'mobil',
            'lokasiJemput',
            'lokasiTujuan'
        ));
    }

    /**
     * Menghitung estimasi biaya
     */
    public function calculate(Request $request, $mobilId)
    {
        $request->validate([
            'lokasi_jemput' => 'required|exists:rute,id',
            'lokasi_tujuan' => 'required|exists:rute,id',
        ]);

        $mobil = Mobil::findOrFail($mobilId);
        $jemput = Rute::findOrFail($request->lokasi_jemput);
        $tujuan = Rute::findOrFail($request->lokasi_tujuan);

        // Hitung jarak (KM)
        $jarak = DistanceHelper::calculate(
            $jemput->latitude,
            $jemput->longitude,
            $tujuan->latitude,
            $tujuan->longitude
        );

        /**
         * LOGIKA TARIF
         */
        $tarifPerKm = match (strtolower($mobil->tipe_mobil)) {
            'avanza' => 6000,
            'hiace'  => 8500,
            default  => 6000,
        };

        $estimasiHarga = round($jarak * $tarifPerKm);

        return back()->with('hasil', [
            'jarak' => round($jarak, 2),
            'harga' => $estimasiHarga,
        ]);
    }
}
