@extends('layouts.master')

@section('title', 'All Albums')

@section('main_content')
    <style>
    .albums {
        background-color: aqua;
    }
    .album {
        width: 300px;
        background-color: lime;
    }
    </style>

    <h2>All Albums</h2>
    <div class="albums">
        @foreach($albums as $album)
        @include('models.album_compact', ['album' => $album])
        @endforeach
    </div>
@endsection
