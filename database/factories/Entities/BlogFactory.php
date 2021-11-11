<?php

namespace Database\Factories\Entities;

use App\Entities\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => null,
            'is_top' => $this->faker->boolean(10),
            'title' => $this->faker->jobTitle,
            'file' => $this->faker->imageUrl,
            'text' => $this->faker->text,
        ];
    }
}
