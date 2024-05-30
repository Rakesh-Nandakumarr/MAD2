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
            'Arabica',
            'Robusta',
            'Colombian',
            'Ethiopian',
            'Brazilian',
            'Costa Rican',
            'Guatemalan',
            'Honduran',
            'Kenyan',
            'Mexican',
        );


        foreach ($coffeeCategories as $categoryName) {
            \App\Models\ProductCategory::create([
                'name' => $categoryName,
                'slug' => \Illuminate\Support\Str::slug($categoryName),
            ]);

        }

    }
}
