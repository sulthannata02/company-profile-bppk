<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    /**
     * Tampilkan list mobil (halaman utama CRUD).
     * Di sini nanti 1 halaman yang ada table + modal tambah/edit.
     */
    public function index()
    {
        $mobils = Mobil::latest()->get();
        return view('admin.mobil', compact('mobils'));  // ← sesuaikan nama file view
    }


    /**
     * Simpan mobil baru (dari modal "Tambah Mobil").
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_mobil' => 'required|string|max:255',
            'tipe_mobil' => 'required|string|max:255',
            'kapasitas' => 'required|numeric',
            'transmisi' => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $filename = null;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            // Simpan ke folder public/mobil
            $file->move(public_path('mobil'), $filename);
        }

        Mobil::create([
            'nama_mobil' => $request->nama_mobil,
            'tipe_mobil' => $request->tipe_mobil,
            'kapasitas' => $request->kapasitas,
            'transmisi' => $request->transmisi,
            'deskripsi' => $request->deskripsi,
            'gambar' => $filename,
        ]);

        return redirect()->route('admin.mobil.index')->with('success', 'Mobil berhasil ditambahkan.');
    }

    /**
     * Update mobil (dari modal "Edit Mobil").
     */
    public function update(Request $request, Mobil $mobil)
    {
        $request->validate([
            'nama_mobil' => 'required|string|max:255',
            'tipe_mobil' => 'required|string|max:255',
            'kapasitas' => 'required|numeric',
            'transmisi' => 'required|string|max:50',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'nama_mobil' => $request->nama_mobil,
            'tipe_mobil' => $request->tipe_mobil,
            'kapasitas' => $request->kapasitas,
            'transmisi' => $request->transmisi,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($mobil->gambar && file_exists(public_path('mobil/' . $mobil->gambar))) {
                @unlink(public_path('mobil/' . $mobil->gambar));
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('mobil'), $filename);
            $data['gambar'] = $filename;
        }

        $mobil->update($data);

        return redirect()->route('admin.mobil.index')->with('success', 'Mobil berhasil diperbarui.');
    }

    /**
     * Hapus mobil (bisa dari tombol di tabel).
     */
    public function destroy(Mobil $mobil)
    {
        // Hapus file gambar
        if ($mobil->gambar && file_exists(public_path('mobil/' . $mobil->gambar))) {
            @unlink(public_path('mobil/' . $mobil->gambar));
        }

        $mobil->delete();

        return redirect()->route('admin.mobil.index')->with('success', 'Mobil berhasil dihapus.');
    }

    /**
     * OPTIONAL: kalau mau pakai AJAX, bisa pakai ini untuk ambil data 1 mobil.
     * Route: GET /admin/mobil/{mobil}
     */
    public function show(Mobil $mobil)
    {
        return response()->json($mobil);
    }
}
