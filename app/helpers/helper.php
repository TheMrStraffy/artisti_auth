<?php

function stampaNome($name){
    return 'Ciao ' . $name;
}



function generateSlug($string, $model, $helperStr){
    $slug = $helperStr::slug($string, '-');

    $original_slug = $slug;
    $c = 1;
    $exists = $model::where('slug',$slug)->first();
    while($exists){
        $slug = $original_slug . '-' . $c;
        $exists = $model::where('slug',$slug)->first();
        $c++;
    }
    return $slug;
}
