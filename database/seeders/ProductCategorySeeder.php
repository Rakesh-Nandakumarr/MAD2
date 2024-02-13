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
        $foodCategories = array(
            "Espresso-Based Drinks" => array("Espresso", "Americano", "Latte", "Cappuccino", "Macchiato"),
            "Brewed Coffee" => array("Drip Coffee", "Pour-Over", "French Press", "Cold Brew"),
            "Specialty Coffees" => array("Mocha", "Caramel Macchiato", "Flat White", "Affogato"),
            "Iced Coffees" => array("Iced Latte", "Iced Americano", "Cold Brew with Milk"),
            "Flavored Coffees" => array("Vanilla Coffee", "Hazelnut Coffee", "Cinnamon Dolce Coffee"),
            "Non-Coffee Beverages" => array("Hot Chocolate", "Chai Latte", "Tea"),
            "Coffee Beans" => array("Arabica", "Robusta", "Single Origin", "Blends"),
            "Snacks" => array("Muffins", "Croissants", "Cookies", "Sandwiches"),
            "Desserts" => array("Cakes", "Pastries", "Brownies", "Tarts"),
            "Milk Alternatives" => array("Soy Milk", "Almond Milk", "Oat Milk", "Coconut Milk"),
            "Add-ons and Extras" => array("Whipped Cream", "Caramel Drizzle", "Chocolate Syrup", "Vanilla Syrup"),
        );

        foreach ($foodCategories as $categoryName => $fooditem) {
            $category = \App\Models\ProductCategory::create([
                'name' => $categoryName,
                'slug' => \Illuminate\Support\Str::slug($categoryName),
            ]);

            foreach ($fooditem as $fooditemName) {
                \App\Models\ProductCategory::create([
                    'name' => $fooditemName,
                    'slug' => \Illuminate\Support\Str::slug($fooditemName),
                    'parent_id' => $category->id,
                ]);
            }
        }

    }
}
