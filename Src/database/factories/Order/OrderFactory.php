<?php

namespace Database\Factories\Order;

use App\Models\Coupon;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'total_price' => $this->faker->randomFloat(2, 20, 1000),
            'coupon_discount' => $this->faker->optional()->randomFloat(2, 5, 100),
            'state' => $this->faker->randomElement(['accepted', 'cancelled', 'review']),
            'user_id' => User::factory(),
            'coupon_id' => Coupon::factory(),
        ];
    }
}
