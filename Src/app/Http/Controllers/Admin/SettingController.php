<?php

namespace App\Http\Controllers\Admin;

use _Storage;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware("can:viewAny,App\Models\Setting")->only('index');
        $this->middleware("can:update,App\Models\Setting")->only('update');
    }

    public function index()
    {
        $page_title = __('pages.settings');

        return view('admin.settings', compact('page_title'));
    }

    public function update(Request $request, $mainKey)
    {

        $settings_map = _Storage::getJsonFromLocal('settings/map')->get($mainKey);

        if (! $settings_map) {
            return back()->with('error', __('messages.error.settings.unknown_mainKey'));
        }

        $setting = Setting::firstOrCreate(['key' => $mainKey]);
        $setting_value = $setting->value ?? (object) [];

        foreach ($request->only($settings_map->inputs) as $key => $value) {
            $setting_value->{$key} = $value;
        }
        foreach ($settings_map->files as $key) {
            $setting_value->{$key} = _Storage::upload($key, 'settings', $setting_value->{$key} ?? null);
        }

        $setting->value = $setting_value;
        $setting->update();

        Cache::forget('settings');

        return back()->withSuccess(__('messages.success.updated'));
    }
}
