@extends('layouts.app')

@include('header_footer.footer')

@section('content')

<div class="container-fluid">
    <div class="jumbotron">
        <h1 style="font-size: 20px; font-size: 7.0vw;">{{$category->name}}</h1>

        @if(Auth::user())
        @if(Auth::user()->role_id === 1 || Auth::user()->role_id === 2 )
        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-primary btn-sm "
            style='float: left;margin-right:5px;'>Edit</a>

        <form method="post" action="{{ route('categories.destroy', $category->id) }}" style='float: left;'>
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-danger btn-sm ">delete</button>
        </form>
        @endif
        @endif
    </div>
</div>
<div class="col-md-8">
    @foreach($category->blog as $blog)
    <h3><a href="{{ route('blogs_show', [$blog->slug]) }}" style="font-size: 20px; font-size: 3.5vw;">
            {{ $blog->title }}</a></h3>
    <p style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;">{!! Str::limit($blog->content, 350) !!}</p>
    <br>
    <hr>
    <br>
    @endforeach

</div>


@endsection



