@extends('layouts.master')

@section('main_content')
    <div>Title: {{ $photo->title }}</div>
    <div>Description: {{ $photo->description }}</div>
    <div><img src="{{ $photo->getMedURL() }}" alt=""></div>
@endsection