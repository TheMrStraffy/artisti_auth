<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Artwork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ArtworksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $artwork_data = config('db.artworks');
        $str = new Str();

        foreach ($artwork_data as $artwork) {
            $new_artwork = new Artwork();
            //dump($artwork['artist']);
            $artist_id = Artist::where('name','like','%' . $artwork['artist'] .'%')->first()->id;

            $new_artwork->artist_id = $artist_id;
            $new_artwork->name = $artwork['name'];
            $new_artwork->slug = generateSlug($new_artwork->name,$new_artwork,$str);
            $new_artwork->year = $artwork['year'];
            $new_artwork->description = $faker->paragraph();
            $new_artwork->save();
        }

        for($i = 0;  $i < 50; $i++){
            $new_artwork = new Artwork();
            $artist_id = Artist::inRandomOrder()->first()->id;
            $new_artwork->artist_id = $artist_id;
            $new_artwork->name = $faker->name();
            $new_artwork->slug = generateSlug($new_artwork->name,$new_artwork,$str);
            $new_artwork->year = $faker->year();
            $new_artwork->description = $faker->paragraph();
            $new_artwork->save();
        }
    }
}
