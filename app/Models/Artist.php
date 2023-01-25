<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Artist extends Model
{
    use HasFactory;

    public function artworks(){
        return $this->hasMany(Artwork::class);
    }

    public static function generateSlug($string){
        $slug = Str::slug($string, '-');

        $original_slug = $slug;
        $c = 1;
        $museum_exists = Artist::where('slug',$slug)->first();
        while($museum_exists){
            $slug = $original_slug . '-' . $c;
            $museum_exists = Artist::where('slug',$slug)->first();
            $c++;
        }
        return $slug;
    }
}
