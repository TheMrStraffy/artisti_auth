@extends('layouts.admin')

@section('content')

<div class="container-fluid text-white">

    <h1>MODIFICA MUSEO</h1>

    <form action="{{route('admin.museums.update', $museum)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" id="name" value="{{old('name', $museum->name)}}" placeholder="Inserisci il nome del museo">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Indirizzo</label>
            <input type="text" name="address" class="form-control" id="address" value="{{old('address', $museum->address)}}" placeholder="Inserisci l'indirizzo del museo">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input
            onchange="showImage(event)"
            type="file" name="image" class="form-control" id="image">

            <div class="mt-2">
                <img id="output-image" width="150" src="" alt="">
            </div>

        </div>

        <div class="mb-3">
            <label for="nation" class="form-label">Nazione</label>
            <input type="text" name="nation" class="form-control" id="nation" value="{{old('nation', $museum->nation)}}" placeholder="Inserisci la nazione del museo">
        </div>

        <button type="submit" class="btn btn-outline-success">CREA</button>

    </form>

</div>

<script>

    function showImage(event){
        const tagImage = document.getElementById('output-image');
        tagImage.src = URL.createObjectURL(event.target.files[0]);
    }

</script>

@endsection
