<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $sectionNames = [
            'القرآن الكريم',
            'الأحاديث النبوية',
            'القصص الإسلامية',
            'الأناشيد الدينية',
            'اللغة العربية',
            'العلوم الشرعية',
            'الألعاب التعليمية',
            'الكتب الإسلامية للأطفال',
            'التاريخ الإسلامي',
            'التربية الإسلامية',
            'الشخصيات الإسلامية',
            'الفقه الإسلامي',
            'الطب النبوي',
        ];

        return [
            'name' => $this->faker->randomElement($sectionNames),
            'sort' => $this->faker->unique()->numberBetween(1, 100),
        ];
    }
}
