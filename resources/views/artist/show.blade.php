@extends('layouts.admin')

@section('content')
    <p class="text-center py-5 text-white">
        Info su:
    </p>
    <h4 class="text-center fw-bolder text-white">
        {{ $artist->name }}
    </h4>
    <div class="text-white text-center">
        <h5>Elenco opere</h5>
        <ul>
            @forelse ($artist->artworks as $artwork)
                <li>{{$artwork->name}}</li>
            @empty
                <li>Nessun risultato trovato</li>
            @endforelse
        </ul>
    </div>


    <div class="d-flex justify-content-center py-5">
        <a class="btn btn-warning" href="">MODIFICA</a>
        <a class="btn btn-danger mx-3" href="">ELIMINA</a>
    </div>
@endsection
