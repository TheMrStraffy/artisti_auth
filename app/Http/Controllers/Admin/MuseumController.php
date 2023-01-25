<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Museum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MuseumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $museums = Museum::orderBy('id', 'desc')->paginate(8);
        $direction = 'desc';
        return view('museums.index', compact('museums', 'direction'));
    }

    /* public function orderby($column, $direction)
    {
        $direction = $direction === 'desc' ? 'asc' : 'desc';
        $museums = Museum::orderBy($column, $direction)->paginate(8);

        return view('museums.index', compact('direction', 'museums'));
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('museums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $str = new Str();
        $museum = new Museum();


        $form_data=$request->all();
        $form_data['slug'] = generateSlug($form_data['name'], $museum, $str);

        if(array_key_exists('image', $form_data)){

            $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();

            $form_data['image'] = Storage::put('uploads', $form_data['image']);
        }

        $new_museum = Museum::create($form_data);

        return redirect()->route('admin.museums.show', $new_museum)->with('messages', "Il museo è stato creato correttamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Museum $museum)
    {
        return view('museums.show', compact('museum'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Museum $museum)
    {
        return view('museums.edit', compact('museum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Museum $museum)
    {
        $str = new Str();
        $museum_class = new Museum();

        $form_data = $request->all();

        // modifico lo slug generandone uno nuovo se e solo se il titolo è stato modifcato
        if($form_data['name'] != $museum->name){
            $form_data['slug'] = generateSlug($form_data['name'], $museum_class, $str);
        } else {
            $form_data['slug'] = $museum->slug;
        }

        // controllo immagine
        if(array_key_exists('image',$form_data)){

            // se invio una nuova immagine devo eliminare la vecchia dal filesystem
            if($museum->image){
                Storage::disk('public')->delete($museum->image);
            }
            $form_data['image_original_name'] = $request->file('image')->getClientOriginalName();
            $form_data['mage'] = Storage::put('uploads', $form_data['image']);
        }

        $museum->update($form_data);

        return redirect()->route('admin.museums.show', $museum)->with('messagges', "Il museo è stato modificato correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Museum $museum)
    {
        $museum->delete();

        return redirect()->route('admin.museums.index')->with('messages', "Museo $museum->name eliminato con successo");
    }

}
