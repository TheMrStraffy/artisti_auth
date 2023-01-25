<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Artist - Artwork</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite('resources/js/app.js')

</head>

<body class="bg-dark vh-100 d-flex justify-content-center flex-column align-items-center">
    <h1 class="text-center text-white mb-5">
        ARTWORKS DB
    </h1>
    <div class="container bg-light">
        <form action="{{route('admin.artwork.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <div class="mb-3">

                    <label for="name">Name</label>
                    <input type="text" name="name" value="" class="form-control" id="name" placeholder="Name Here">
                </div>
                <div class="mb-3">

                    <label for="image">Image</label>
                    <input type="file" name="image" value="" class="form-control" id="image" placeholder="Image Here">
                </div>
                <div class="mb-3">
                    <label for="image">Image</label>
                    <select class="form-control" name="artist_id" id="artist_id">
                        @foreach ($artists as $artist)
                            <option value="{{$artist->id}}">{{$artist->name}}</option>
                        @endforeach

                    </select>
                </div>



                <div class="mb-3">

                    <label for="description">Description</label>
                    <input type="text" name="description" value="" class="form-control" id="description" placeholder="Description Here">
                </div>

                <div class="mb-3">

                    <label for="year">Year</label>
                    <input type="number" name="year" value="" class="form-control" id="year">
                </div>
            </div>

            <a class="btn btn-success" href="{{route('admin.artwork.index')}}">Artworks</a>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</body>

</html>
