@extends('layouts.app')



@section('content')

<div class="container">
    <h3>{{ $user->name }}</h3>
    <hr>
    @foreach($user->blogs as $blog)
    <a href=" {{ route('blogs_show', [$blog->slug]) }} ">
        <h2 style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;">{{$blog->title}}</h2>
    </a>
    {!! Str::limit($blog->content,200) !!}
    @endforeach
</div>


@endsection