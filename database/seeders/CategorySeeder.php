<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'CPU',
            'slug'=>'cpu'
        ]);
        Category::create([
            'name' => 'Motherboard',
            'slug'=>'motherboard'
        ]);
        Category::create([
            'name' => 'Graphics Card',
            'slug'=>'graphics'
        ]);
        Category::create([
            'name' => 'PSU',
            'slug'=>'psu'
        ]);
        Category::create([
            'name' => 'SSD',
            'slug'=>'ssd'
        ]);
        Category::create([
            'name' => 'RAM',
            'slug'=>'ram'
        ]);
        Category::create([
            'name' => 'Computer Case',
            'slug'=>'case'
        ]);
    }
}
