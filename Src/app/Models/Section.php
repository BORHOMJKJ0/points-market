<?php

namespace App\Models;

use App\Traits\SluggedUrlTrait;
use App\Traits\SortTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory, SluggedUrlTrait,SortTrait;

    public function slugged_url_property()
    {
        return $this->name;
    }
}
