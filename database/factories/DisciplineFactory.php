<?php

namespace Database\Factories;

use App\Models\Discipline;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class DisciplineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape([
        'name' => "string",
        'code' => "string"
    ])]
    public function definition(): array
    {
        $slug = $this->faker->slug();

        return [
            'name' => $slug,
            'code' => $slug,
        ];
    }
}
