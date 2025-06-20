<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Review;
use Faker\Factory as Faker;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $users = User::all();
        $products = Product::all();

        $prefixes = ['So', 'Really', 'Very', 'Absolutely'];
        $adjectives = ['good', 'great', 'amazing', 'awesome', 'fantastic', 'excellent'];

        foreach ($products as $product) {
            $reviewCount = rand(10, 20);

            for ($i = 0; $i < $reviewCount; $i++) {
                $user = $users->random();

                $content = $faker->randomElement($prefixes) . ' ' . $faker->randomElement($adjectives) . '!';

                if (rand(1, 100) <= 80) {
                    $rating = rand(4, 5);
                } else {
                    $rating = rand(1, 3);
                }

                Review::create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'rating' => $rating,
                    'content' => $content,
                ]);
            }
        }
    }
}
