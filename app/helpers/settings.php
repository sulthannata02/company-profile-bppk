<?php

use App\Models\Setting;
use Illuminate\Support\Facades\App;

if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        $setting = Setting::where('key', $key)->first();
        if (!$setting) {
            return $default;
        }

        $locale = App::getLocale();
        $field = "value_{$locale}";

        return $setting->$field ?? $setting->value_id ?? $default;
    }
}
