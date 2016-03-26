@extends('layouts.master')

@section('main_content')
<h1>View Album</h1>
    @foreach($photos as $photo)
    <div class="photo">
        <div>Title: {{ $photo->title }}</div>
        <div>Description: {{ $photo->description }}</div>
        <div>
            <img src="{{ $photo->getThumbnailURL() }}" alt="{{ $photo->title }}">            
        </div>

    </div>
    @endforeach
@endsection