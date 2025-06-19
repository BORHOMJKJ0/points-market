<?php

namespace App\Models;

use App\Traits\ActiveTrait;
use App\Traits\HasFileTrait;
use App\Traits\SortTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use ActiveTrait, HasFileTrait, SortTrait,HasFactory;

    public $files = ['image'];

    protected $dates = ['start', 'end'];
}
