@extends('layouts.app')

@include('header_footer.footer')

@section('content')

<div class="container-fluid">
    <h1 align="center">Blogs by {{ $user->name }}</h1>
    <hr>
    @foreach($user->blogs as $blog)
    <a href=" {{ route('blogs_show', [$blog->slug]) }} ">
        <h2 style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;">{{$blog->title}}</h2>
    </a>
    <p style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;">{!! Str::words($blog->content, 10, "....") !!}</p>
    <hr>
    @endforeach
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>


@endsection