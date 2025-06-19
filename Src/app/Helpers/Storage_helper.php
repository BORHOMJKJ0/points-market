<?php

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class _Storage
{
    public static function upload($file, $path, $old_file = null)
    {
        $file_name = $file;

        if (is_string($file)) {
            $file = request()->file($file);
        }

        if (! $file) {

            if (request()->has("old_$file_name")) {
                return $old_file;
            }

            if ($old_file) {
                self::delete_file($old_file);
            }

            return null;

        }

        if ($old_file) {
            self::delete_file($old_file);
        }
        do {
            $file_name = Str::random().'.'.$file->getClientOriginalExtension();
        } while (self::is_exists("$path/$file_name"));

        return $file->storeAs($path, $file_name);
    }

    public static function is_exists($path)
    {
        return $path && self::public_storage()->exists($path);
    }

    public static function delete_file($path)
    {
        if (self::is_exists($path)) {
            self::public_storage()->delete($path);
        }
    }

    public static function delete_directory($path)
    {
        if (self::is_exists($path)) {
            self::public_storage()->deleteDirectory($path);
        }
    }

    /**
     * @return Storage
     */
    public static function public_storage()
    {
        return Storage::disk('public');
    }

    public static function uploads($path)
    {
        return self::is_exists($path) ? self::public_storage()->url($path) : null;
    }

    /**
     * @return Collection
     */
    public static function getJsonFromLocal($path)
    {
        return collect(json_decode(Storage::disk('local')->get("json/$path.json")));
    }
}
