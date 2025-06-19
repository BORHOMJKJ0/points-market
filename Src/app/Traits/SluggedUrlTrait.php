<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait SluggedUrlTrait
{
    public function slugged_url_route()
    {
        return 'site.'.$this->table.'.show';
    }

    public function slugged_url_property()
    {
        return $this->title;
    }

    public function slugged_url()
    {
        return route($this->slugged_url_route(), [$this->slugged_param() => $this->slug()]);
    }

    public function slugged_param()
    {
        return Str::singular($this->table);
    }

    public function slug()
    {
        return $this->id.'-'.str_replace(' ', '-', $this->slugged_url_property());
    }

    public static function find_from_slug($slug)
    {
        $slug = explode('-', $slug);

        return self::find($slug[0] ?? null);
    }

    public static function find_or_fail_from_slug($slug)
    {
        $slug = explode('-', $slug);

        return self::findOrFail($slug[0] ?? null);
    }

    public static function get_id_from_slug($slug)
    {
        $slug = explode('-', $slug);

        return $slug[0] ?? null;
    }
}
