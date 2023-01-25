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
    <div class="container">
        <div class="container bg-white">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Year</th>
                    <th scope="col">description</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">{{ $artwork->id }}</th>
                    <td>{{ $artwork->name }}</td>
                    <td>{{ $artwork->year }}</td>
                    <td>{{ $artwork->description }}</td>
                  </tr>
                </tbody>
              </table>
        </div>

        <a class="btn btn-success" href="{{route('admin.artwork.index')}}">Artworks</a>
        <a class="btn btn-warning" href="{{route('admin.artwork.edit', $artwork)}}">Edita</a>
        <a class="btn btn-warning" href="{{route('admin.artwork.create', $artwork)}}">Crea</a>
        <form action="" method="POST" class="d-inline"
                    onsubmit="return confirm('Confermi l\'eliminazione di: {{ $artwork->name }}?')"
                    class="d-inline" action="" method="POST">

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Elimina</button>
        </form>
    </div>
</body>

</html>
