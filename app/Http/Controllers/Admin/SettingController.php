<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::orderBy('group')->orderBy('key')->get();
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|unique:settings,key',
            'group' => 'required',
            'type' => 'required|in:text,textarea,image',
        ]);

        Setting::create($request->all());

        return back()->with('success', 'Setting key created successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'group' => 'required',
            'type' => 'required|in:text,textarea,image',
        ]);

        $setting->update($request->all());

        return back()->with('success', 'Setting updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();
        return back()->with('success', 'Setting deleted successfully!');
    }
}
