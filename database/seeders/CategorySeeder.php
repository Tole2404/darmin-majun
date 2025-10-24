<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Kain Majun Putih',
                'slug' => 'kain-majun-putih',
                'description' => 'Kain majun putih premium untuk industri dan bengkel',
                'icon' => '⚪',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Kain Majun Warna',
                'slug' => 'kain-majun-warna',
                'description' => 'Kain majun warna bekas untuk kebutuhan umum',
                'icon' => '🌈',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Kain Majun Premium',
                'slug' => 'kain-majun-premium',
                'description' => 'Kain majun premium kualitas terbaik',
                'icon' => '⭐',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name' => 'Kain Majun Industri',
                'slug' => 'kain-majun-industri',
                'description' => 'Kain majun khusus untuk industri besar',
                'icon' => '🏭',
                'is_active' => true,
                'order' => 4,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
