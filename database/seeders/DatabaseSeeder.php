<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Seed categories
        $categories = [
            ['name' => 'Best Sellers'],
            ['name' => 'Promos'],
            ['name' => 'Accessories'],
            ['name' => 'Foods and Treats'],
        ];

        foreach ($categories as $index => $category) {
            Category::create([
                'id' => $index + 1, // Assign the predefined IDs
                'name' => $category['name'],
            ]);
        }
    }
}
