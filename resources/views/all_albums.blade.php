@extends('layouts.master')

@section('main_content')
    @foreach($albums as $album)
    <div class="album">
        <div>Title: {{ $album->title }}</div>
        <div>Description: {{ $album->description }}</div>
        <div>Number of Photos: {{ $album->numPhotos() }}</div>
        <div><a href="{{ url('album/'.$album->id) }}">View Album</a></div>
    </div>
    @endforeach
@endsection