<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test user
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);

        // Create categories
        $categories = [
            ['name' => 'All', 'slug' => 'all', 'description' => 'Semua produk'],
            ['name' => 'Sayur', 'slug' => 'sayur', 'description' => 'Sayuran segar'],
            ['name' => 'Buah', 'slug' => 'buah', 'description' => 'Buah-buahan segar'],
            ['name' => 'Daging', 'slug' => 'daging', 'description' => 'Daging berkualitas'],
            ['name' => 'Seafood', 'slug' => 'seafood', 'description' => 'Hasil laut segar'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Get categories
        $sayurCategory = Category::where('slug', 'sayur')->first();
        $buahCategory = Category::where('slug', 'buah')->first();
        $dagingCategory = Category::where('slug', 'daging')->first();
        $seafoodCategory = Category::where('slug', 'seafood')->first();

        // Create products
        $products = [
            // Sayur
            [
                'name' => 'Tomat Segar',
                'description' => 'Tomat merah segar berkualitas tinggi',
                'price' => 15000,
                'original_price' => 20000,
                'stock' => 50,
                'image' => 'tomato.png',
                'category_id' => $sayurCategory->id,
                'rating' => 4.8,
                'reviews_count' => 156
            ],
            [
                'name' => 'Wortel Organik',
                'description' => 'Wortel organik tanpa pestisida',
                'price' => 12000,
                'original_price' => 15000,
                'stock' => 40,
                'image' => 'carrot.png',
                'category_id' => $sayurCategory->id,
                'rating' => 4.6,
                'reviews_count' => 98
            ],
            // Buah
            [
                'name' => 'Pisang Kuning',
                'description' => 'Pisang kuning matang manis',
                'price' => 8000,
                'original_price' => 10000,
                'stock' => 100,
                'image' => 'banana.png',
                'category_id' => $buahCategory->id,
                'rating' => 4.7,
                'reviews_count' => 234
            ],
            [
                'name' => 'Apel Merah',
                'description' => 'Apel merah impor segar',
                'price' => 25000,
                'original_price' => 30000,
                'stock' => 30,
                'image' => 'apple.png',
                'category_id' => $buahCategory->id,
                'rating' => 4.9,
                'reviews_count' => 167
            ],
            [
                'name' => 'Mangga Harum',
                'description' => 'Mangga harum manis dan besar',
                'price' => 18000,
                'original_price' => 22000,
                'stock' => 45,
                'image' => 'mango.png',
                'category_id' => $buahCategory->id,
                'rating' => 4.8,
                'reviews_count' => 145
            ],
            // Daging
            [
                'name' => 'Daging Ayam',
                'description' => 'Daging ayam segar dan higienis',
                'price' => 35000,
                'original_price' => 40000,
                'stock' => 60,
                'image' => 'chicken.png',
                'category_id' => $dagingCategory->id,
                'rating' => 4.7,
                'reviews_count' => 189
            ],
            [
                'name' => 'Daging Sapi',
                'description' => 'Daging sapi premium pilihan',
                'price' => 85000,
                'original_price' => 100000,
                'stock' => 25,
                'image' => 'beef.png',
                'category_id' => $dagingCategory->id,
                'rating' => 4.9,
                'reviews_count' => 156
            ],
            // Seafood
            [
                'name' => 'Ikan Salmon',
                'description' => 'Ikan salmon segar impor',
                'price' => 120000,
                'original_price' => 150000,
                'stock' => 20,
                'image' => 'salmon.png',
                'category_id' => $seafoodCategory->id,
                'rating' => 4.9,
                'reviews_count' => 89
            ],
            [
                'name' => 'Udang Vaname',
                'description' => 'Udang vaname besar dan segar',
                'price' => 95000,
                'original_price' => 120000,
                'stock' => 35,
                'image' => 'udang-vaname.png',
                'category_id' => $seafoodCategory->id,
                'rating' => 4.8,
                'reviews_count' => 134
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

