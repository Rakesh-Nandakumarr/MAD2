<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coffeeCategories = array(
            "Hot Coffees",
            "Cold Coffees",
            "Flavored Coffees",
            "Specialty Coffees",
            "Coffee Beans",
            "Coffee Pods",
            "Coffee Capsules",
            "Coffee Creamers",
            "Coffee Sweeteners",
            "Coffee Syrups",
            "Coffee Filters",
            "Coffee Mugs",
            "Coffee Grinders",
            "Coffee Makers",
            "Coffee Accessories",
            "Coffee Gifts",
            "Coffee Subscriptions",
            "Coffee Books",
            "Coffee Courses",
            "Coffee Events",
            "Coffee Blogs",
            "Coffee Podcasts",
            "Coffee Videos",
            "Coffee Magazines",
            "Coffee News",
            "Coffee Recipes",
            "Coffee Quotes",
            "Coffee Jokes",
            "Coffee Memes",
            "Coffee Art",
            "Coffee Photography",
            "Coffee Music",
            "Coffee Movies",
            "Coffee TV Shows",
            "Coffee Games",
            "Coffee Apps",
         );

        foreach ($coffeeCategories as $categoryName) {
            \App\Models\ProductCategory::create([
                'name' => $categoryName,
                'slug' => \Illuminate\Support\Str::slug($categoryName),
            ]);

        }

    }
}
