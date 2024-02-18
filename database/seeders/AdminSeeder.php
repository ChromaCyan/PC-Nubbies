<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    User::create([
        'name' => 'admin',
        'email' => 'admin123@gmail.com',
        'address' => 'tapuac',
        'phone' => '999999999',
        'password' => Hash::make('password'),
        'usertype' => 2
    ]);
}
}
