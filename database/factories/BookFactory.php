<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    private $images_names = [
        '1.jpg',
        '2.jpg',
        '3.jpg',
        '4.jpg',
        '5.jpg',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->unique()->word(),
            'description' => fake()->paragraph(),
            'url' => fake()->url(),
            'published_year' => fake()->year(),
            'available' => fake()->randomElement([0, 1]),
            'authors' => fake()->words(3),
            'co_authors' => fake()->words(2),
            'cover_image' => fake()->randomElement($this->images_names)
        ];
    }
}
