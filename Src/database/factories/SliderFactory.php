<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    protected $model = Slider::class;

    public function definition()
    {
        return [
            'image' => 'sliders/' . $this->faker->imageUrl(800, 400, 'business', true),
            'link' => $this->faker->optional()->url,
            'sort' => $this->faker->unique()->numberBetween(1, 100),
        ];
    }
}
