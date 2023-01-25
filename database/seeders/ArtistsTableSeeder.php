<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {


        $artists = config('db.artists');

        $str = new Str();

        foreach ($artists as $artist) {
            $new_artist = new Artist();
            $new_artist->name = $artist['name'];
            $new_artist->slug = generateSlug($new_artist->name, $new_artist, $str);
            $new_artist->bio = $faker->paragraph();
            $new_artist->save();
        }

        for($i = 0; $i < 20; $i++){
            $new_artist = new Artist();
            $new_artist->name = $faker->name();
            $new_artist->slug = generateSlug($new_artist->name, $new_artist, $str);
            $new_artist->bio = $faker->paragraph();
            $new_artist->save();
        }
    }
}
