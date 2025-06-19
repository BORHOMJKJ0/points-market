<?php

namespace App\Models\Product;

use App\Models\Order\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    protected $table = 'product_repositories';

    use HasFactory;

    public function order_product()
    {
        return $this->belongsTo(Product::class);
    }
}
