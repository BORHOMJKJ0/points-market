<?php

namespace App\Models\Product;

use App\Models\Section;
use App\Traits\HasFileTrait;
use App\Traits\SluggedUrlTrait;
use App\Traits\SortTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasFileTrait, SluggedUrlTrait, SortTrait;

    public $files = ['main_image'];

    public function slugged_url_property()
    {
        return $this->name;
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function current_offer()
    {
        return $this->hasOne(Offer::class)->where('begin_date', '<=', now())->where('end_date', '>=', now())->orderByDesc('discount_percentage');

    }

    public function offer_price($format = false)
    {
        $offer = $this->current_offer;

        return $offer ? ($this->price - (($offer->discount_percentage / 100) * $this->price)) : $this->price;

    }

    public function repositories()
    {
        return $this->hasMany(Repository::class);
    }
}
