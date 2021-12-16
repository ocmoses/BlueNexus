<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->delete();

        DB::table('products')->insert(array(
            [
                'name' => 'Beauty Treatment', 
                'image' => '/images/beauty.jpg', 
                'description' => 'The best beauty products in town. Get the best price.',
                'price' => 150000, 
                'in_stock' => 30
            ],
            [
                'name' => 'Camera', 
                'image' => '/images/camera.jpg', 
                'description' => 'The latest in image technology. Buy for this one-time low price',
                'price' => 120000, 
                'in_stock' => 50
            ],
            [
                'name' => 'Men\'s Shoes', 
                'image' => '/images/shoes.jpg', 
                'description' => 'Clasic men\'s italian leather shoes. Get the best price anywhere in the market',
                'price' => 80000, 
                'in_stock' => 10
            ]
        ));
    }
}
