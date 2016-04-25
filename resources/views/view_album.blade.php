@extends('layouts.master')

@section('title', 'Album : ' . $album->title)

@section('main_content')

<style>
    .photo {
        display: inline-block;
        width: 300px;
        margin: 5px;
        background-color: #999;
    }
</style>

<h1>Album: {{ $album->title }}</h1>
<p>{{ $album->description }}</p>
    @foreach($photos as $photo)
    <div class="photo">
        <h2>Title: {{ $photo->title }}</h2>
        <div>
    <a href="{{ url('photo/' . $photo->id) }}"><img src="{{ $photo->getThumbnailURL() }}" alt="{{ $photo->title }}"></a>

        Description: {{ $photo->description }}</div>
        <div>
        
        </div>

    </div>
    @endforeach

    <div>
        <a href="{{ url('album/' . $album->id . '/add_photos') }}">Add Photos</a>
    </div>

@endsection