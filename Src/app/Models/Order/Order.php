<?php

namespace App\Models\Order;

use App\Models\Coupon;
use App\Models\Product\Product;
use App\Models\User\User;
use App\Traits\StateTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, StateTrait;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products')->withPivot('price', 'quantity');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
}
