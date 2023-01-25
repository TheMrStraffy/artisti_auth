@extends('layouts.admin')

@section('content')
  <div class="container text-white">
    <h1 class="my-4">Add a new artist</h1>

    <form action="{{ route('admin.artist.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="name" class="form-label">Artist name*</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"
          placeholder="Add artist name">
      </div>



      <div class="mb-3">
        <label for="name" class="form-label">Artwork name*</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"
          placeholder="Add artwork name">
      </div>


      <button type="submit" class="btn btn-primary mb-2">Submit</button>

    </form>

    <div>
      <a href="{{ route('admin.artist.index') }}" class="btn btn-danger">Cancel</a>
    </div>

  </div>
@endsection
