<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'category_id' => Category::where('slug', 'dinner')?->first()?->id,
                'name' => 'Tomato Curry',
                'description' => 'Natalie & Justin Cleaning by Justin Younger',
                'price' => 20,
                'image' => asset('assets/frontend/images/food1.jpg'),
            ],
            [
                'category_id' => Category::where('slug', 'breakfast')?->first()?->id,
                'name' => 'Prawn Dish',
                'description' => 'Natalie & Justin Cleaning by Justin Younger',
                'price' => 20,
                'image' => asset('assets/frontend/images/food2.jpg'),
            ],
            [
                'category_id' => Category::where('slug', 'desert')?->first()?->id,
                'name' => 'Salad Dish',
                'description' => 'Natalie & Justin Cleaning by Justin Younger',
                'price' => 18,
                'image' => asset('assets/frontend/images/food3.jpg'),
            ],
            [
                'category_id' => Category::where('slug', 'special')?->first()?->id,
                'name' => 'Pawn Dish',
                'description' => 'Natalie & Justin Cleaning by Justin Younger',
                'price' => 18,
                'image' => asset('assets/frontend/images/food4.jpg'),
            ],
            [
                'category_id' => Category::where('slug', 'breakfast')?->first()?->id,
                'name' => 'Vegetable Dish',
                'description' => 'Natalie & Justin Cleaning by Justin Younger',
                'price' => 15,
                'image' => asset('assets/frontend/images/food5.jpg'),
            ],
            [
                'category_id' => Category::where('slug', 'special')?->first()?->id,
                'name' => 'Chicken Dish',
                'description' => 'Natalie & Justin Cleaning by Justin Younger',
                'price' => 22,
                'image' => asset('assets/frontend/images/food6.jpg'),
            ],
            [
                'category_id' => Category::where('slug', 'desert')?->first()?->id,
                'name' => 'Vegetable Noodles',
                'description' => 'Natalie & Justin Cleaning by Justin Younger',
                'price' => 32,
                'image' => asset('assets/frontend/images/food7.jpg'),
            ],
            [
                'category_id' => Category::where('slug', 'dinner')?->first()?->id,
                'name' => 'Special Salad',
                'description' => 'Natalie & Justin Cleaning by Justin Younger',
                'price' => 38,
                'image' => asset('assets/frontend/images/food8.jpg'),
            ],
            [
                'category_id' => Category::where('slug', 'special')?->first()?->id,
                'name' => 'Ice Cream',
                'description' => 'Natalie & Justin Cleaning by Justin Younger',
                'price' => 40,
                'image' => asset('assets/frontend/images/food9.jpg'),
            ],
        ];

        foreach ($items as $item) {
            // Extract the image file name from the asset URL
            $imagePath = parse_url($item['image'], PHP_URL_PATH);
            $imageName = basename($imagePath);

            // Move the image to storage and get the path
            $storagePath = 'uploads/item/' . $imageName;
            Storage::disk(config('filesystems.default'))->put($storagePath, file_get_contents(public_path($imagePath)));

            // Update the slider image path
            $item['image'] = $storagePath;
            Item::create($item);
        }

        $this->command->info('Items table seeded!');
    }
}
