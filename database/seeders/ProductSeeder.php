<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Product::create([
        	'title' => 'Lorem Ipsum',
        	'price' => 15.20,
        	'quantity' => 3,
        	'category_id' => 1,
        	'brand_id' =>1,
        	'description' => 'qelkqwjeqwlkejqwkleqwjelkqwjeklqwejqwlkejqwkleqwjelkqwjelkqwjelqwkejqwlkejqwlkejqwlkejqwkleqjwlkeqjwlkeqwjelkqwjelkqwjelqwkejqwlkeqw'

        ]);
    }
}
