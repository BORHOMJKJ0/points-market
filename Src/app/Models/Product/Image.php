<?php

namespace App\Models\Product;

use App\Traits\HasFileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'product_images';

    protected $guarded = [];

    public $files = ['path'];

    use HasFactory, HasFileTrait;
}
