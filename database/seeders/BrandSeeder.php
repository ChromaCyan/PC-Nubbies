<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create([
        	'name' => 'Dell',
        	'slug' => 'dell'
        ]);
        Brand::create([
        	'name' => 'Acer',
        	'slug' => 'dell'
        ]);
        Brand::create([
        	'name' => 'Apple',
        	'slug' => 'dell'
        ]);
    }
}
