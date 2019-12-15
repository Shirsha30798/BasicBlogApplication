@extends('layouts.app')

@section('content')

<div class="container">
    @foreach($categories as $category)
    <a href="{{ route('categories.show', $category->slug) }}">
        <h2>{{$category->name}}</h2>
    </a>
    @endforeach

</div>

@endsection