<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    protected $model = Setting::class;

    public function definition()
    {
        return [
            'key' => $this->faker->randomElement([
                'عنوان_الموقع', 'وصف_الموقع', 'البريد_الإلكتروني', 'رقم_الهاتف', 'عنوان_الشركة'
            ]),
            'value' => json_encode(['setting' => $this->faker->sentence(4, true)]),
        ];
    }
}
