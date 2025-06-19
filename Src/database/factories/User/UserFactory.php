<?php

namespace Database\Factories\User;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $boysNames = [
            'محمد', 'أحمد', 'علي', 'حسن', 'حسين', 'يوسف', 'إبراهيم', 'موسى', 'عمر', 'خالد',
            'عادل', 'سلمان', 'عبدالله', 'عبدالرحمن', 'سعد', 'زياد', 'طارق', 'مالك', 'عبدالملك', 'إسماعيل',
        ];

        return [
            'name' => $this->faker->randomElement($boysNames),
            'phone' => '09'.$this->faker->numerify('##########'),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ];
    }
}
