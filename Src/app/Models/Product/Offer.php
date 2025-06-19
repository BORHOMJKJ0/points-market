<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'product_offers';

    protected $dates = ['begin_date', 'end_date'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
