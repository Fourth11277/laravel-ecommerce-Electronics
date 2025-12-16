<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();
        
        if ($categories->isEmpty()) {
            $this->command->error('Please run CategorySeeder first!');
            return;
        }

        $products = [
            // Smartphone - 2 products
            [
                'name' => 'iPhone 15 Pro Max',
                'description' => 'Latest iPhone with A17 Pro chip, 256GB storage, and Pro camera system.',
                'price' => 1199.99,
                'stock' => 50,
                'category' => 'Smartphone',
                'featured' => true,
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'description' => 'Premium Android smartphone with 200MP camera and S Pen.',
                'price' => 1299.99,
                'stock' => 40,
                'category' => 'Smartphone',
                'featured' => true,
            ],
            
            // Laptop - 2 products
            [
                'name' => 'MacBook Pro 16" M3 Max',
                'description' => 'Powerful laptop for professionals with M3 Max chip and 32GB RAM.',
                'price' => 3499.99,
                'stock' => 20,
                'category' => 'Laptop',
                'featured' => true,
            ],
            [
                'name' => 'Dell XPS 15',
                'description' => 'Premium Windows laptop with 4K display and Intel i9 processor.',
                'price' => 2499.99,
                'stock' => 30,
                'category' => 'Laptop',
                'featured' => true,
            ],
            
            // Camera - 2 products
            [
                'name' => 'Canon EOS R5',
                'description' => 'Professional mirrorless camera with 45MP sensor and 8K video.',
                'price' => 3899.99,
                'stock' => 15,
                'category' => 'Camera',
                'featured' => true,
            ],
            [
                'name' => 'Sony A7 IV',
                'description' => 'Full-frame mirrorless camera perfect for photography and videography.',
                'price' => 2499.99,
                'stock' => 20,
                'category' => 'Camera',
                'featured' => false,
            ],
        ];

        foreach ($products as $product) {
            $category = $categories->firstWhere('name', $product['category']);
            
            if ($category) {
                Product::create([
                    'category_id' => $category->id,
                    'name' => $product['name'],
                    'slug' => Str::slug($product['name']),
                    'description' => $product['description'],
                    'price' => $product['price'],
                    'stock' => $product['stock'],
                    'sku' => 'SKU-' . strtoupper(Str::random(8)),
                    'featured' => $product['featured'],
                    'active' => true,
                ]);
            }
        }
    }
}
