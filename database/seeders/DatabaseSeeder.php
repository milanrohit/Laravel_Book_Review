<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Review;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 books, each with 5 to 15 reviews
        Book::factory(10)->create()->each(function ($book) {
            
            $numReviews = random_int(5, 30);

            // Create  good reviews for each book
            Review::factory($numReviews)->count($numReviews)
                ->good()->for($book)
                ->create();

            // Create average reviews for each book
            Review::factory($numReviews)->count($numReviews)
                ->average()->for($book)
                ->create();

            // Create bad reviews for each book
            Review::factory($numReviews)->count($numReviews)
                ->bad()->for($book)
                ->create();
        });
    }
}
