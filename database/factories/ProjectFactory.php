<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $slug = $this->faker->userName();

        return [
            'name' => $slug,
            'code' => $slug,
            'theme' => $this->faker->userName(),
            'discipline_id' => 1,
            'user_id' => 1,
            'publish_date' => now()
        ];
    }
}
