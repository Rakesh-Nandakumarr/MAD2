<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // add a array of 5 products
        $products = [
            [
                'category_id' => 1,
                'name' => 'Espresso',
                'slug' => Str::slug('Espresso'),
                'description' => 'A strong, black coffee made by forcing steam through ground coffee beans.',
                'meta_title' => 'Espresso - Strong Black Coffee',
                'meta_description' => 'Discover the rich and bold flavor of our Espresso. Perfect for coffee lovers.',
                'meta_keywords' => 'espresso, coffee, black coffee, strong coffee',
                'stock' => 100,
                'price' => 2.50,
                'status' => true,
                'thumbnail' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree-photos-vectors%2Fultra-hd&psig=AOvVaw2x9H6jLQoSJGFJIyDg7P0C&ust=1716224288995000&source=thumbnails&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCPCq6OmXmoYDFQAAAAAdAAAAABAE',
            ],
            [
                'category_id' => 1,
                'name' => 'Cappuccino',
                'slug' => Str::slug('Cappuccino'),
                'description' => 'A classic Italian coffee drink made with espresso, steamed milk, and milk foam.',
                'meta_title' => 'Cappuccino - Italian Coffee Drink',
                'meta_description' => 'Enjoy a perfect blend of espresso, steamed milk, and milk foam with our Cappuccino.',
                'meta_keywords' => 'cappuccino, coffee, Italian coffee, milk coffee',
                'stock' => 100,
                'price' => 3.00,
                'status' => true,
                'thumbnail' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree-photos-vectors%2Fultra-hd&psig=AOvVaw2x9H6jLQoSJGFJIyDg7P0C&ust=1716224288995000&source=thumbnails&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCPCq6OmXmoYDFQAAAAAdAAAAABAE',
            ],
            [
                'category_id' => 1,
                'name' => 'Affogato',
                'slug' => Str::slug('Affogato'),
                'description' => 'A delicious coffee-based dessert made with a scoop of vanilla ice cream and a shot of espresso.',
                'meta_title' => 'Affogato - Coffee-Based Dessert',
                'meta_description' => 'Indulge in the delicious taste of our Affogato, made with vanilla ice cream and a shot of espresso.',
                'meta_keywords' => 'affogato, coffee, dessert, ice cream, espresso',
                'stock' => 100,
                'price' => 4.50,
                'status' => true,
                'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree-photos-vectors%2Fultra-hd&psig=AOvVaw2x9H6jLQoSJGFJIyDg7P0C&ust=1716224288995000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCPCq6OmXmoYDFQAAAAAdAAAAABAE',
            ],
            [
                'category_id' => 2,
                'name' => 'Americano',
                'slug' => Str::slug('Americano'),
                'description' => 'A simple and refreshing coffee made by adding hot water to espresso.',
                'meta_title' => 'Americano - Simple and Refreshing Coffee',
                'meta_description' => 'Enjoy the simple and refreshing taste of our Americano, made with espresso and hot water.',
                'meta_keywords' => 'americano, coffee, black coffee, refreshing coffee',
                'stock' => 100,
                'price' => 2.75,
                'status' => true,
                'thumbnail' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree-photos-vectors%2Fultra-hd&psig=AOvVaw2x9H6jLQoSJGFJIyDg7P0C&ust=1716224288995000&source=thumbnails&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCPCq6OmXmoYDFQAAAAAdAAAAABAE',
            ],
            [
                'category_id' => 2,
                'name' => 'Mocha',
                'slug' => Str::slug('Mocha'),
                'description' => 'A rich and indulgent coffee drink made with espresso, steamed milk, and chocolate.',
                'meta_title' => 'Mocha - Rich and Indulgent Coffee',
                'meta_description' => 'Treat yourself to the rich and indulgent taste of our Mocha, made with espresso, steamed milk, and chocolate.',
                'meta_keywords' => 'mocha, coffee, chocolate coffee, indulgent coffee',
                'stock' => 100,
                'price' => 4.00,
                'status' => true,
                'thumbnail' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree-photos-vectors%2Fultra-hd&psig=AOvVaw2x9H6jLQoSJGFJIyDg7P0C&ust=1716224288995000&source=thumbnails&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCPCq6OmXmoYDFQAAAAAdAAAAABAE',
            ],
            [
                'category_id' => 2,
                'name' => 'Café au Lait',
                'slug' => Str::slug('Café au Lait'),
                'description' => 'A coffee drink made with equal parts brewed coffee and steamed milk.',
                'meta_title' => 'Café au Lait - Coffee with Steamed Milk',
                'meta_description' => 'Experience the perfect balance of brewed coffee and steamed milk with our Café au Lait.',
                'meta_keywords' => 'café au lait, coffee, steamed milk, brewed coffee',
                'stock' => 100,
                'price' => 3.25,
                'status' => true,
                'thumbnail' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree'
            ],
            [
                'category_id' => 2,
                'name' => 'Café au Lait',
                'slug' => Str::slug('Café au Lait'),
                'description' => 'A coffee drink made with equal parts brewed coffee and steamed milk.',
                'meta_title' => 'Café au Lait - Coffee with Steamed Milk',
                'meta_description' => 'Experience the perfect balance of brewed coffee and steamed milk with our Café au Lait.',
                'meta_keywords' => 'café au lait, coffee, steamed milk, brewed coffee',
                'stock' => 100,
                'price' => 3.25,
                'status' => true,
                'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree'
            ],
            [
                'category_id' => 3,
                'name' => 'Macchiato',
                'slug' => Str::slug('Macchiato'),
                'description' => 'A coffee drink made with a small amount of steamed milk added to espresso.',
                'meta_title' => 'Macchiato - Coffee with Steamed Milk',
                'meta_description' => 'Experience the perfect balance of espresso and steamed milk with our Macchiato.',
                'meta_keywords' => 'macchiato, coffee, steamed milk, espresso',
                'stock' => 100,
                'price' => 3.25,
                'status' => true,
                'thumbnail' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree-photos-vectors%2Fultra-hd&psig=AOvVaw2x9H6jLQoSJGFJIyDg7P0C&ust=1716224288995000&source=thumbnails&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCPCq6OmXmoYDFQAAAAAdAAAAABAE',
            ],
            [
                'category_id' => 3,
                'name' => 'Flat White',
                'slug' => Str::slug('Flat White'),
                'description' => 'A smooth coffee drink made with espresso and steamed milk, similar to a latte but with a higher coffee-to-milk ratio.',
                'meta_title' => 'Flat White - Smooth Coffee Drink',
                'meta_description' => 'Enjoy the smooth and rich taste of our Flat White, made with espresso and steamed milk.',
                'meta_keywords' => 'flat white, coffee, smooth coffee, espresso and milk',
                'stock' => 100,
                'price' => 3.50,
                'status' => true,
                'thumbnail' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree-photos-vectors%2Fultra-hd&psig=AOvVaw2x9H6jLQoSJGFJIyDg7P0C&ust=1716224288995000&source=thumbnails&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCPCq6OmXmoYDFQAAAAAdAAAAABAE',
            ],
            [
                'category_id' => 3,
                'name' => 'Cortado',
                'slug' => Str::slug('Cortado'),
                'description' => 'A coffee drink made with equal parts espresso and steamed milk.',
                'meta_title' => 'Cortado - Coffee with Steamed Milk',
                'meta_description' => 'Experience the perfect balance of espresso and steamed milk with our Cortado.',
                'meta_keywords' => 'cortado, coffee, steamed milk, espresso',
                'stock' => 100,
                'price' => 3.25,
                'status' => true,
                'thumbnail' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree'
            ],
            [
                'category_id' => 3,
                'name' => 'Cortado',
                'slug' => Str::slug('Cortado'),
                'description' => 'A coffee drink made with equal parts espresso and steamed milk.',
                'meta_title' => 'Cortado - Coffee with Steamed Milk',
                'meta_description' => 'Experience the perfect balance of espresso and steamed milk with our Cortado.',
                'meta_keywords' => 'cortado, coffee, steamed milk, espresso',
                'stock' => 100,
                'price' => 3.25,
                'status' => true,
                'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree'
            ],
            [
                'category_id' => 4,
                'name' => 'Iced Coffee',
                'slug' => Str::slug('Iced Coffee'),
                'description' => 'A refreshing coffee drink made with brewed coffee served over ice.',
                'meta_title' => 'Iced Coffee - Refreshing Coffee Drink',
                'meta_description' => 'Cool down with our refreshing Iced Coffee, made with brewed coffee served over ice.',
                'meta_keywords' => 'iced coffee, coffee, cold coffee, refreshing drink',
                'stock' => 100,
                'price' => 3.00,
                'status' => true,
                'thumbnail' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree-photos-vectors%2Fultra-hd&psig=AOvVaw2x9H6jLQoSJGFJIyDg7P0C&ust=1716224288995000&source=thumbnails&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCPCq6OmXmoYDFQAAAAAdAAAAABAE',
            ],
            [
                'category_id' => 4,
                'name' => 'Frappuccino',
                'slug' => Str::slug('Frappuccino'),
                'description' => 'A blended coffee drink made with ice, espresso, milk, and flavorings.',
                'meta_title' => 'Frappuccino - Blended Coffee Drink',
                'meta_description' => 'Indulge in the creamy and icy taste of our Frappuccino, made with ice, espresso, milk, and flavorings.',
                'meta_keywords' => 'frappuccino, coffee, blended coffee, iced coffee',
                'stock' => 100,
                'price' => 4.50,
                'status' => true,
                'thumbnail' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree-photos-vectors%2Fultra-hd&psig=AOvVaw2x9H6jLQoSJGFJIyDg7P0C&ust=1716224288995000&source=thumbnails&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCPCq6OmXmoYDFQAAAAAdAAAAABAE',
            ],
            [
                'category_id' => 4,
                'name' => 'Nitro Cold Brew',
                'slug' => Str::slug('Nitro Cold Brew'),
                'description' => 'A smooth and creamy coffee drink made by infusing cold brew coffee with nitrogen gas.',
                'meta_title' => 'Nitro Cold Brew - Smooth and Creamy Coffee',
                'meta_description' => 'Experience the smooth and creamy taste of our Nitro Cold Brew, made by infusing cold brew coffee with nitrogen gas.',
                'meta_keywords' => 'nitro cold brew, coffee, creamy coffee, cold brew coffee',
                'stock' => 100,
                'price' => 4.50,
                'status' => true,
                'thumbnail' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree'
            ],
            [
                'category_id' => 5,
                'name' => 'Latte',
                'slug' => Str::slug('Latte'),
                'description' => 'A smooth and creamy coffee drink made with espresso and steamed milk.',
                'meta_title' => 'Latte - Smooth and Creamy Coffee',
                'meta_description' => 'Indulge in the smooth and creamy taste of our Latte, made with espresso and steamed milk.',
                'meta_keywords' => 'latte, coffee, creamy coffee, steamed milk',
                'stock' => 100,
                'price' => 3.50,
                'status' => true,
                'thumbnail' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree-photos-vectors%2Fultra-hd&psig=AOvVaw2x9H6jLQoSJGFJIyDg7P0C&ust=1716224288995000&source=thumbnails&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCPCq6OmXmoYDFQAAAAAdAAAAABAE',
            ],
            [
                'category_id' => 5,
                'name' => 'Iced Latte',
                'slug' => Str::slug('Iced Latte'),
                'description' => 'A refreshing coffee drink made with espresso, steamed milk, and ice.',
                'meta_title' => 'Iced Latte - Refreshing Coffee Drink',
                'meta_description' => 'Cool down with our refreshing Iced Latte, made with espresso, steamed milk, and ice.',
                'meta_keywords' => 'iced latte, coffee, cold coffee, refreshing drink',
                'stock' => 100,
                'price' => 4.00,
                'status' => true,
                'thumbnail' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree'
            ],
            [
                'category_id' => 4,
                'name' => 'Nitro Cold Brew',
                'slug' => Str::slug('Nitro Cold Brew'),
                'description' => 'A smooth and creamy coffee drink made by infusing cold brew coffee with nitrogen gas.',
                'meta_title' => 'Nitro Cold Brew - Smooth and Creamy Coffee',
                'meta_description' => 'Experience the smooth and creamy taste of our Nitro Cold Brew, made by infusing cold brew coffee with nitrogen gas.',
                'meta_keywords' => 'nitro cold brew, coffee, creamy coffee, cold brew coffee',
                'stock' => 100,
                'price' => 4.50,
                'status' => true,
                'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree'
            ],
            [
                'category_id' => 5,
                'name' => 'Latte',
                'slug' => Str::slug('Latte'),
                'description' => 'A smooth and creamy coffee drink made with espresso and steamed milk.',
                'meta_title' => 'Latte - Smooth and Creamy Coffee',
                'meta_description' => 'Indulge in the smooth and creamy taste of our Latte, made with espresso and steamed milk.',
                'meta_keywords' => 'latte, coffee, creamy coffee, steamed milk',
                'stock' => 100,
                'price' => 3.50,
                'status' => true,
                'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree-photos-vectors%2Fultra-hd&psig=AOvVaw2x9H6jLQoSJGFJIyDg7P0C&ust=1716224288995000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCPCq6OmXmoYDFQAAAAAdAAAAABAE',
            ],
            [
                'category_id' => 5,
                'name' => 'Iced Latte',
                'slug' => Str::slug('Iced Latte'),
                'description' => 'A refreshing coffee drink made with espresso, steamed milk, and ice.',
                'meta_title' => 'Iced Latte - Refreshing Coffee Drink',
                'meta_description' => 'Cool down with our refreshing Iced Latte, made with espresso, steamed milk, and ice.',
                'meta_keywords' => 'iced latte, coffee, cold coffee, refreshing drink',
                'stock' => 100,
                'price' => 4.00,
                'status' => true,
                'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree'
            ],
            [
                'category_id' => 5,
                'name' => 'Cold Brew',
                'slug' => Str::slug('Cold Brew'),
                'description' => 'A smooth and refreshing coffee drink made by steeping coffee grounds in cold water for an extended period.',
                'meta_title' => 'Cold Brew - Smooth and Refreshing Coffee',
                'meta_description' => 'Enjoy the smooth and refreshing taste of our Cold Brew, made by steeping coffee grounds in cold water.',
                'meta_keywords' => 'cold brew, coffee, smooth coffee, cold coffee',
                'stock' => 100,
                'price' => 4.00,
                'status' => true,
                'thumbnail' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree-photos-vectors%2Fultra-hd&psig=AOvVaw2x9H6jLQoSJGFJIyDg7P0C&ust=1716224288995000&source=thumbnails&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCPCq6OmXmoYDFQAAAAAdAAAAABAE',
            ],
        ];
            


        foreach ($products as $product) {

            // take the image out
            $image = $product['image'];

            // remove the image from the product array
            unset($product['image']);


            $product_model = \App\Models\Product::create($product);

            // image
            $product_model
                ->addMediaFromUrl($image)
                ->toMediaCollection('featured_image');

        }
    }
}
