<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create([
            'name' => 'Intel',
            'slug'=>'intel'
        ]);
        Brand::create([
            'name' => 'AMD',
            'slug'=>'amd'
        ]);
        Brand::create([
            'name' => 'ASUS',
            'slug'=>'asus'
        ]);
        Brand::create([
            'name' => 'Gigabyte',
            'slug'=>'gigabyte'
        ]);
        Brand::create([
            'name' => 'NVIDIA',
            'slug'=>'nvidia'
        ]);
        Brand::create([
            'name' => 'Corsair',
            'slug'=>'corsair'
        ]);
        Brand::create([
            'name' => 'EVGA',
            'slug'=>'evga'
        ]);
        Brand::create([
            'name' => 'Samsung',
            'slug'=>'samsung'
        ]);
        Brand::create([
            'name' => 'Kingston',
            'slug'=>'kingston'
        ]);
        Brand::create([
            'name' => 'Gskill',
            'slug'=>'gskill'
        ]);
        Brand::create([
            'name' => 'NZXT',
            'slug'=>'nzxt'
        ]);
    }
}
