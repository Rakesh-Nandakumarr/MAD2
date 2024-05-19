<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                'category_id' => 1, // replace with actual category id
                'name' => 'Product 1',
                'slug' => 'product-1',
                'description' => 'Description for product 1',
                'meta_title' => 'Meta Title 1',
                'meta_description' => 'Meta Description 1',
                'meta_keywords' => 'Meta, Keywords, 1',
                'quantity' => 100,
                'price' => 10.00,
                'order_by' => 1,
                'status' => 1,
                'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.freepik.com%2Ffree-photos-vectors%2Fultra-hd&psig=AOvVaw2x9H6jLQoSJGFJIyDg7P0C&ust=1716224288995000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCPCq6OmXmoYDFQAAAAAdAAAAABAE'
            ],[
                'category_id' => 3, // replace with actual category id
                'name' => 'Product 3',
                'slug' => 'product-3',
                'description' => 'Description for product 3',
                'meta_title' => 'Meta Title 3',
                'meta_description' => 'Meta Description 3',
                'meta_keywords' => 'Meta, Keywords, 3',
                'quantity' => 300,
                'price' => 30.00,
                'order_by' => 3,
                'status' => 3,
                'image' => 'https://s3.eu-central-1.amazonaws.com/cdn.nowa.market/media/483/conversions/Banane-BIO-product_thumb.jpg',
            ],[
                'category_id' => 2, // replace with actual category id
                'name' => 'Product 2',
                'slug' => 'product-2',
                'description' => 'Description for product 2',
                'meta_title' => 'Meta Title 2',
                'meta_description' => 'Meta Description 2',
                'meta_keywords' => 'Meta, Keywords, 2',
                'quantity' => 200,
                'price' => 20.00,
                'order_by' => 2,
                'status' => 2,
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrS4lHXOepaPm-0FgmXCi0uUHlNmIU6RLHuewIeC8Ttg&s'
            ]];


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
