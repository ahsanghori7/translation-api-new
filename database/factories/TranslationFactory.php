<?php

namespace Database\Factories;

use App\Models\Translation;
use Illuminate\Database\Eloquent\Factories\Factory;

class TranslationFactory extends Factory
{
    protected $model = Translation::class;

    public function definition(): array
    {
        return [
            'key' => $this->faker->unique()->bothify('trans_##??'),
            'locale' => $this->faker->randomElement(['en', 'fr', 'es']),
            'content' => $this->faker->sentence(),
            'tag' => $this->faker->randomElement(['mobile', 'desktop', 'web']),
        ];
    }
}
