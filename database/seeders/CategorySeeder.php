<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
{
    $categories = ['IT', 'Marketing', 'Finance', 'Education', 'Healthcare'];

    foreach ($categories as $category) {
        \App\Models\Category::create(['name' => $category]);
    }
}
}