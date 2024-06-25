<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Movie;
use App\Models\Genre;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $genres = Genre::factory()->createMany([
            ['name' => 'Action'],
            ['name' => 'Comedy'],
            ['name' => 'Drama'],
            ['name' => 'Horror'],
            ['name' => 'Sci-Fi'],
        ]);

        Movie::factory(30)->create()->each(function ($movie) use ($genres) {
            // Attach random genres to each movie 
            $randomGenres = $genres->random(rand(1, 3))->pluck('id');
            $movie->genres()->attach($randomGenres);
        });
    }
}
