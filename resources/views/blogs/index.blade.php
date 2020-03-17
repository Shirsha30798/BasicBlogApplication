@extends('layouts.app')

@include('partials.meta_static')

<!-- @include('header_footer.footer')

@include('header_footer.header') -->

@section('content')

<div class="container w-100 p-3 mw-100" id = "index_container">

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

    <div class="contentwrap">
    @foreach($blogs as $blog)
    <article>
        <div class="col-md-8 offset-md-2 text-center">

            <a href=" {{ route('blogs_show', [$blog->slug]) }} ">
                <h2 style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;"><strong>{{$blog->title}}</strong></h2>
            </a>
            <div class="col-md-12 ">
                @if($blog->featured_image)
                <img src="/image/featured_image/{{ $blog->featured_image ? $blog->featured_image:''}}"
                    alt="{{ Str::limit($blog->title, 10) }}" class="img-responsive featured_image"
                    style="width=100%,height:100%;">
                @endif
            </div>
            <br>
            <div class="lead" style=" font-size: 0.81em ;">{!! Str::words($blog->content, 90, '...') !!}</div>
            <div id = "index-writer">
                @if($blog->user)
                Author :<a href="{{ route('users.show', $blog->user->name) }}"  > {{ $blog->user->name }} </a> |
                Posted:{{ $blog->created_at->diffForHumans()}}
                @endif
            </div>
        </div>
    </article>
    <br>
    <hr><br>
    @endforeach
    </div>
    <div id="pages" class="row  justify-content-center">
        {!! $blogs->links() !!}
    </div>

</div>
@endsection