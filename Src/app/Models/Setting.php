<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'value' => 'object',
    ];

    public static function getKeyValueObject()
    {
        return Cache::rememberForever('settings', function () {
            return (object) self::pluck('value', 'key')->toArray();
        });

    }

    public static function get($key, $value)
    {
        $settings = self::getKeyValueObject();

        return $settings->{$key}->{$value} ?? null;
    }
}
