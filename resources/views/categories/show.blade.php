@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="jumbotron">
        <h1 style="font-size: 20px; font-size: 7.0vw;">{{$category->name}}</h1>

        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-primary btn-sm "
            style='float: left;margin-right:5px;'>Edit</a>

        <form method="post" action="{{ route('categories.destroy', $category->id) }}" style='float: left;'>
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-danger btn-sm ">delete</button>
        </form>
    </div>
</div>
<div class="col-md-8">
    @foreach($category->blog as $blog)
    <h3><a href="{{ route('blogs_show', $blog->id) }}" style="font-size: 20px; font-size: 3.5vw;">
            {{ $blog->title }}</a></h3>
    <p style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;">{{$blog->content}}</p>
    @endforeach

</div>


@endsection