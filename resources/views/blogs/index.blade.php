@extends('layouts.app')

@include('partials.meta_static')

@section('content')

<div class="container">

    @if(Session::has('blog_created_message'))
    <div class="alert alert-success" style>
        {{ Session::get('blog_created_message') }}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
    @endif

    @if(Session::has('contact_message_sent'))
    <div class="alert alert-success" style>
        {{ Session::get('contact_message_sent') }}
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
    @endif


    @foreach($blogs as $blog)
    <div class="col-md-8 offset-md-2 text-center">
        
        <a href=" {{ route('blogs_show', [$blog->slug]) }} ">
            <h2 style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;">{{$blog->title}}</h2>
        </a>
        <div class="col-md-12 ">
            @if($blog->featured_image)
            <img src="/image/featured_image/{{ $blog->featured_image ? $blog->featured_image:''}}"
                alt="{{ Str::limit($blog->title, 10) }}" class="img-responsive featured_image" style="width=100%,height:100%;">
            @endif
        </div>
        <br>
        <div class="lead">{!! Str::limit($blog->content, 100) !!}</div>
        @if($blog->user)
        Author :<a href="{{ route('users.show', $blog->user->name) }}"> {{ $blog->user->name }} </a> |
        Posted:{{ $blog->created_at->diffForHumans()}}
        @endif
    </div>
    <br>
    <hr><br>
    @endforeach


</div>
@endsection