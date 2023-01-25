<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Museum extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'nation'];


    public static function generateSlug($string){
        $slug = Str::slug($string, '-');

        $original_slug = $slug;
        $c = 1;
        $museum_exists = Museum::where('slug',$slug)->first();
        while($museum_exists){
            $slug = $original_slug . '-' . $c;
            $museum_exists = Museum::where('slug',$slug)->first();
            $c++;
        }
        return $slug;
    }
}
