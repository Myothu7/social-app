<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 10),
            'title' => $this->faker->title,
            'feeling_id' => 0,
            'content' => $this->faker->text($maxNbChars = 200),
            'photo' => $this->faker->imageUrl($width = 640, $height = 480),
        ];
    }
}
