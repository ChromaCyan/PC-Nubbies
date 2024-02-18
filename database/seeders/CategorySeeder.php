<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
        	'name' => 'CPU',
        	'slug' => 'dell'
        ]);
        Category::create([
        	'name' => 'Motherboard',
        	'slug' => 'dell'
        ]);
        Category::create([
        	'name' => 'Graphics Card',
        	'slug' => 'dell'
        ]);
        Category::create([
        	'name' => 'PSU',
        	'slug' => 'dell'
        ]);
        Category::create([
        	'name' => 'RAM/SSD',
        	'slug' => 'dell'
        ]);
    }
}
