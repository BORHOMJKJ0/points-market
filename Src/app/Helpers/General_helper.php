<?php

use App\Models\Setting;

function setting($key, $value, $uploads = false)
{
    $setting = Setting::get($key, $value);

    return $uploads ? _Storage::uploads($setting) : $setting;

}
