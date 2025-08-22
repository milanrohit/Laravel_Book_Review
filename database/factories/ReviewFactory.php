<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Review;
use App\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => null, // This should be set when creating a review for a specific book
            'review' => fake()->paragraph(),
            'rating' => fake()->numberBetween(1, 5),
            'created_at' => fake()->dateTimeBetween('-2 years'),
            'updated_at' => fake()->dateTimeBetween('created_at','now')
        ];
    }

    /**
     * Indicate that the review is bad (rating 1 or 2).
     */
    public function bad()
    {
        return $this->state(function (array $attributes) {
            return [
                'rating' => fake()->numberBetween(1, 2),
            ];
        });
    }

    /**
     * Indicate that the review is average (rating 3).
     */
    public function average()
    {
        return $this->state(function (array $attributes) {
            return [
                'rating' => 3,
            ];
        });
    }

    /**
     * Indicate that the review is good (rating 4 or 5).
     */
    public function good()
    {
        return $this->state(function (array $attributes) {
            return [
                'rating' => fake()->numberBetween(4, 5),
            ];
        });
    }
}
