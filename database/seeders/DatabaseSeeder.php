<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $categories = Category::factory(5)->create();

        $users = User::factory(5)->create();

        Product::factory(5)->create([
            'category_id' => ($categories->random(1)->first())->id
        ])->each(function($product) use ($users) {
            Comment::factory(rand(1,5))->create([
                'product_id'=> $product->id,
                'user_id'=> ($users->random(1)->first())->id
            ]);
        });
    }
}
