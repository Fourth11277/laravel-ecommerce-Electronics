<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Smartphone',
                'description' => 'Latest smartphones and mobile devices',
            ],
            [
                'name' => 'Laptop',
                'description' => 'High-performance laptops for work and gaming',
            ],
            [
                'name' => 'Camera',
                'description' => 'Digital cameras and photography equipment',
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
            ]);
        }
    }
}
