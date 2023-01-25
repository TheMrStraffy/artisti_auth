<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\Artwork;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_artworks = Artwork::all();
        return view('artworks.index', compact('all_artworks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artists = Artist::all();
        return view('artworks.create', compact('artists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $str= new Str;
        $form_data = $request->all();
        $new_artwork = new Artwork();
        $form_data['slug'] = generateSlug($form_data['name'], $new_artwork, $str);
        $new_artwork->fill($form_data);
        $new_artwork->save();

        if(array_key_exists('artist', $form_data)){
            $new_artwork->artist()->attach($form_data['artist']);
        }
        return redirect()->route('admin.artwork.show', $new_artwork);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Artwork $artwork)
    {
        return view('artworks.show', compact('artwork'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Artwork $artwork)
    {
        return view('artworks.edit', compact('artwork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
