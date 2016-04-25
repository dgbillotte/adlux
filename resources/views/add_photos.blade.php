@extends('layouts.master')

@section('title', 'Add Photos')

@section('main_content')
    <script src="/js/vendor/dropzone.js"></script>
    <link rel="stylesheet" href="/css/vendor/dropzone.css">

    <style>
        form.dropzone {
            width: 80%;
            margin: 0 auto;
        }
    </style>

    <h1>{{ $album->title }}: Add Photos</h1>

    <form action="/album/{{$album->id}}/add_photos" class="dropzone">
    {{ csrf_field() }}



    <button>submit</button>
    </form>


@endsection