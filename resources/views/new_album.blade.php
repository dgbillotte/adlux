@extends('layouts.master')

@section('main_content')
<h1>Create New Album</h1>

<form action="" method="POST">
{{ csrf_field() }}
<div>
    <span>Title: </span>
    <span><input type="text" name="title"></span>
</div>
<div>
    <span>Description: </span>
    <span><input type="text" name="description"></span>
</div>
<button>Create</button>
</form>

@endsection