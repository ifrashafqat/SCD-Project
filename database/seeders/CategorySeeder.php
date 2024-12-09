<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Category::create(['name' => 'Wedding']);
    \App\Models\Category::create(['name' => 'Reception']);
    \App\Models\Category::create(['name' => 'Mehendi']);
    \App\Models\Category::create(['name' => 'BirthdayParty']);
    \App\Models\Category::create(['name' => 'Musical Night']);


    }
}
