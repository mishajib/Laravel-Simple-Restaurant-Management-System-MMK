<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Breakfast',
                'slug' => 'breakfast',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Special',
                'slug' => 'special',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Desert',
                'slug' => 'desert',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dinner',
                'slug' => 'dinner',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Category::insert($categories);

        $this->command->info('Categories table seeded!');
    }
}
