@extends('layouts.admin')

@section('content')
    <div class="container">
        <a class="btn btn-info my-4" href="{{ route('admin.artist.create') }}">AGGIUNGI ARTISTA</a>
        <table class="table text-white">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">AZIONI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($artists as $artist)
                    <tr>
                        <th scope="row">{{ $artist->id }}</th>
                        <td>{{ $artist->name }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.artist.show', $artist) }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a class="btn btn-warning mx-2" href="">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a class="btn btn-danger" href="">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center py-5">
            {{ $artists->links() }}
        </div>
    </div>
@endsection
