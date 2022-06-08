<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @extends Factory
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $slug = $this->faker->userName();
        $replaceable = ['/', '.'];

        return [
            'name' => $slug,
            'code' => $slug,
            'theme' => $this->faker->userName(),
            'discipline_id' => 1,
            'user_id' => 1,
            'external_id' => str_replace($replaceable, '', Hash::make('code')),
            'publish_date' => null
        ];
    }
}
