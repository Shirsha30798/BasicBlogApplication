@extends('layouts.app')


@include('header_footer.footer')

@section('content')

<div class="container-fluid " id = "trash_container">
    <div class="jumbotron">

        <h1>Trash</h1>

    </div>

</div>

<div class="col-md-12">

    @foreach($trashedBlogs as $blog)

    <!--<a href=" {{ route('blogs_show', $blog->id) }} ">-->
        <h2>{{$blog->title}}</h2>
    <!--</a>-->
    </p>{{$blog->content}}</p>

    <!--restore-->
    <form action="{{ route('blogs_restore', $blog->id) }}" method="get" style ='float: left; padding: 5px;'>
        @csrf
        <button class="btn btn-outline-success btn-sm pull-left btn-margin-right" type="submit">restore</button>
    </form>

    <!--permanently delete-->
    <form action="{{ route('blogs_permanent-delete', $blog->id) }}" method="POST" style ='float: left; padding: 5px;'>
        @csrf
        {{ method_field('delete') }}
        <button class="btn btn-outline-danger btn-sm pull-left btn-margin-right" type="submit">delete permanently</button>
    </form>
    <br><br><hr>
    @endforeach

</div>


@endsection