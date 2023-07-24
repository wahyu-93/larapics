<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $images = Storage::allFiles('images');
        foreach($images as $image){
            Image::factory()->create([
                'file' => $image,
                'dimension' => Image::getDimension($image)
            ]);
        }

    }
}
