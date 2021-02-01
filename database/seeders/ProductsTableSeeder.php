<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'PP-Delfin',
            'description' => 'Description 1',
            'type' => config('constants.product_type.for_home'),
            'image_url' => '/vendor/images/pp-image.jpg',
            'price' => 100000
        ]);

        Product::create([
            'name' => 'Product 5',
            'description' => 'Description 5',
            'type' => config('constants.product_type.for_home'),
            'image_url' => '/vendor/images/product5.jpg',
            'price' => 100000
        ]);

        Product::create([
            'name' => 'Product 7',
            'description' => 'Description 7',
            'type' => config('constants.product_type.other'),
            'image_url' => '/vendor/images/product7.jpg',
            'price' => 100000
        ]);
    }
}
