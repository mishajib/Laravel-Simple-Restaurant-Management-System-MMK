<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Remove uploads folder from storage/app/public
        Storage::disk(config('filesystems.default'))->deleteDirectory('uploads');

        $this->call([
            UserSeeder::class,
            SliderSeeder::class,
            CategorySeeder::class,
            ItemSeeder::class,
            ReservationSeeder::class,
            ContactSeeder::class,
        ]);

        $this->command->info('Database seeded!');
    }
}
