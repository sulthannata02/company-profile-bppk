<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('order')->get();
        return view('admin.partners.index', compact('partners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'required|image|mimes:png,jpg,jpeg,svg',
            'link' => 'nullable|url',
        ]);

        $logoName = time() . '_' . $request->file('logo')->getClientOriginalName();
        $request->file('logo')->move(public_path('assets/partner'), $logoName);

        Partner::create([
            'name' => $request->name,
            'logo' => $logoName,
            'link' => $request->link,
            'address' => $request->address,
            'order' => Partner::count() + 1,
        ]);

        return back()->with('success', 'Partner added successfully!');
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,svg',
            'link' => 'nullable|url',
        ]);

        $data = $request->only(['name', 'link', 'address']);

        if ($request->hasFile('logo')) {
            if ($partner->logo && file_exists(public_path('assets/partner/' . $partner->logo))) {
                unlink(public_path('assets/partner/' . $partner->logo));
            }

            $logoName = time() . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('assets/partner'), $logoName);
            $data['logo'] = $logoName;
        }

        $partner->update($data);

        return back()->with('success', 'Partner updated successfully!');
    }

    public function destroy(Partner $partner)
    {
        if ($partner->logo && file_exists(public_path('assets/partner/' . $partner->logo))) {
            unlink(public_path('assets/partner/' . $partner->logo));
        }
        $partner->delete();
        return back()->with('success', 'Partner deleted successfully!');
    }
}
