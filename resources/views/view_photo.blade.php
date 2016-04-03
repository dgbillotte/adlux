@extends('layouts.master')

@section('main_content')
    <h3>Title: {{ $photo->title }}</h3>
    <div>Description: {{ $photo->description }}</div>
    <div><img src="{{ $photo->getMedURL() }}" alt=""></div>
@endsection