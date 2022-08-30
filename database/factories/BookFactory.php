<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    private $images_names = [
        'https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg',
        'https://render.fineartamerica.com/images/images-profile-flow/400/images-medium-large-5/awesome-solitude-bess-hamiti.jpg',
        'https://static.photocdn.pt/images/articles/2019/05/14/What_is_fine_art_photography-1.jpg',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzbfa5WxXlvX_CuyJzuD_ARNl3VBZkN9hTagWWn15dFIUIzVbEaKsBbUCG-45MZ4uiOUo&usqp=CAU',
        'https://www.diyphotography.net/wp-content/uploads/2020/03/89282567_1853540234947464_1166884387451568128_n.jpg',
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
