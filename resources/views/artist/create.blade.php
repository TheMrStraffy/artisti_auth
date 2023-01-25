@extends('layouts.admin')

@section('content')
  <div class="mb-3 w-50 m-auto">
    <form action="{{ route('admin.artist.store') }}" method="POST">
      @csrf
      <label for="name" class="form-label">NOME ARTISTA</label>
      <input name="name" type="text" class="form-control my-3" id="name" placeholder="Inserisci nome artista">
      <button class="btn btn-success" type="submit">AGGIUNGI</button>
    </form>
  </div>



  <div class="container">
    <h1 class="my-4">Add a new artist</h1>

    <form action="{{ route('admin.artist.create') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="name" class="form-label">Artist name*</label>
        <input type="text" class="form-control  name="name" id="name" value="{{ old('name') }}"
          placeholder="Add artist name">
      </div>



      <div class="mb-3">
        <label for="name" class="form-label">Artwork name*</label>
        <input type="text" class="form-control  name="name" id="name" value="{{ old('name') }}"
          placeholder="Add artwork name">
      </div>


      <button type="submit" class="btn btn-primary mb-2">Submit</button>

    </form>

    <div>
      <a href="{{ route('admin.artist.index') }}" class="btn btn-danger">Cancel</a>
    </div>

  </div>
@endsection
