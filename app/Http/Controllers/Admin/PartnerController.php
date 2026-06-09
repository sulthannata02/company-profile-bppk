<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('sort_order')->get();

        return view('admin.partner.index', compact('partners'));
    }

    public function show(Partner $partner)
    {
        return response()->json($partner);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'logo'       => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'website'    => 'nullable|url',
            'address'    => 'required|string',
            'sort_order' => 'nullable|integer',
            'is_active'  => 'nullable|boolean',
        ]);

        $logoName = null;

        if ($request->hasFile('logo')) {
            $logoName = time() . '.' . $request->logo->extension();

            $request->logo->move(
                public_path('partner'),
                $logoName
            );
        }

        Partner::create([
            'name'       => $request->name,
            'logo'       => $logoName,
            'website'    => $request->website,
            'address'    => $request->address,
            'sort_order' => $request->sort_order ?? 0,
            'is_active'  => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.partner.index')
            ->with('success', 'Partner berhasil ditambahkan');
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'logo'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'website'    => 'nullable|url',
            'address'    => 'required|string',
            'sort_order' => 'nullable|integer',
            'is_active'  => 'nullable|boolean',
        ]);

        $logoName = $partner->logo;

        if ($request->hasFile('logo')) {

            $oldLogo = public_path('partner/' . $partner->logo);

            if (File::exists($oldLogo)) {
                File::delete($oldLogo);
            }

            $logoName = time() . '.' . $request->logo->extension();

            $request->logo->move(
                public_path('partner'),
                $logoName
            );
        }

        $partner->update([
            'name'       => $request->name,
            'logo'       => $logoName,
            'website'    => $request->website,
            'address'    => $request->address,
            'sort_order' => $request->sort_order ?? 0,
            'is_active'  => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.partner.index')
            ->with('success', 'Partner berhasil diperbarui');
    }

    public function destroy(Partner $partner)
    {
        $logoPath = public_path('partner/' . $partner->logo);

        if (File::exists($logoPath)) {
            File::delete($logoPath);
        }

        $partner->delete();

        return redirect()
            ->route('admin.partner.index')
            ->with('success', 'Partner berhasil dihapus');
    }
}