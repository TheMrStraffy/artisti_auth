<?php

namespace Database\Seeders;

use App\Models\Museum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class MuseumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $str = new Str();

        for($i = 0; $i < 10; $i++){
            $new_museum = new Museum();
            $new_museum->name = $faker->name();
            $new_museum->slug = generateSlug($new_museum->name, $new_museum, $str);
            $new_museum->address = $faker->address();
            $new_museum->nation = $faker->state();
            $new_museum->save();
        }

    }
}
