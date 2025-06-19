<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => strtoupper($this->faker->unique()->bothify('????-####')),
            'used' => $this->faker->numberBetween(0, 10),
            'limit' => $this->faker->optional()->numberBetween(5, 50),
            'discount' => $this->faker->randomFloat(2, 5, 30),
            'discount_type' => $this->faker->randomElement(['percentage', 'number']),
            'begin_date' => Carbon::now(),
            'end_date' => Carbon::now()->addYear(),
        ];
    }
}
