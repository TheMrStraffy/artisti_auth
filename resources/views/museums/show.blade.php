@extends('layouts.admin')


@section('content')
<div class="container text-center text-white">
    <h1>
        {{$museum->name}}
    </h1>

    <p>
        CI TROVI IN: <br> {{ $museum->address }}
    </p>

    <div>
        <img src="{{asset('storage/' . $museum->image)}}" alt=" {{ $museum->name }}">
    </div>

    <p>
        NAZIONE: {{ $museum->nation }}
    </p>

    <a href=" {{route('admin.museums.index')}} " class="btn btn-primary">
        BACK
    </a>
</div>
@endsection
