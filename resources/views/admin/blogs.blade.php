@extends('layouts.app')

@include('partials.meta_static')

@section('content')

<div class="container-fluid">

    <div class="jumbotron">
        <h1>Manage Blogs</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h3>Published</h3>
            <hr>
            @foreach($publishedBlogs as $blog)
            <h2><a href=" {{ route('blogs_show', [$blog->slug]) }} ">{{$blog->title}}</a></h2>
            <br>
            {{ Str::limit($blog->content,100) }}
            <form action="{{ route('blogs_update', $blog->id) }}" method="POST">
                @csrf
                @method('patch')
                <input name="status" type="checkbox" value="0" checked style="display:none;">
                <button type="submit" class='btn btn-warning'>Save as Draft</button>
            </form>
            @endforeach
        </div>

        <div class="col-md-6">
            <h3>Draft</h3>
            <hr>
            @foreach($draftBlogs as $blog)
            <a href=" {{ route('blogs_show', [$blog->slug]) }} ">
                <h2>{{$blog->title}}</h2>
            </a>
            {{ Str::limit($blog->content,100) }}
            <form action="{{ route('blogs_update', $blog->id) }}" method="POST">
                @csrf
                @method('patch')
                <input name="status" type="checkbox" value="1" checked style="display:none;">
                <button type="submit" class='btn btn-success'>Publish</button>
            </form>
            @endforeach
        </div>

    </div>

</div>

@endsection