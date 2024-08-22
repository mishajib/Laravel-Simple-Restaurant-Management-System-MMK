<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sliders = [
            [
                'title' => 'BEST FOOD',
                'sub_title' => 'DELICIOUS FRESH FOOD',
                'image' => asset('assets/frontend/images/1.jpg'),
            ],
            [
                'title' => 'BEST DRINKS',
                'sub_title' => 'PROVIDING PREMIUM DRINKS',
                'image' => asset('assets/frontend/images/2.jpg'),
            ],
            [
                'title' => 'BEST SNACKS',
                'sub_title' => 'GET YOUR FAVORITE SNACKS',
                'image' => asset('assets/frontend/images/3.jpg'),
            ],
        ];

        foreach ($sliders as $slider) {
            // Extract the image file name from the asset URL
            $imagePath = parse_url($slider['image'], PHP_URL_PATH);
            $imageName = basename($imagePath);

            // Move the image to storage and get the path
            $storagePath = 'uploads/slider/' . $imageName;
            Storage::disk(config('filesystems.default'))->put($storagePath, file_get_contents(public_path($imagePath)));

            // Update the slider image path
            $slider['image'] = $storagePath;
            Slider::create($slider);
        }

        $this->command->info('Sliders table seeded!');
    }
}
