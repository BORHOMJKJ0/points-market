<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'order_products';

    use HasFactory;

    public function product()
    {
        return $this->belongsTo("App\Models\Product\Product");
    }
}
