<?php

namespace App\Models;

use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $dates = ['begin_date', 'end_date'];

    public function exceeded()
    {
        return $this->limit && ($this->used >= $this->limit);
    }

    public function expired()
    {
        return ! now()->between($this->begin_date, $this->end_date);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
