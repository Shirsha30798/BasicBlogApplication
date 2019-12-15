@extends('layouts.app')

@include('partials.meta_dynamic')

@section('content')

<div class="container-fluid">
    <article>
        <div class="jumbotron "
            style="background: linear-gradient(to right, #1D4350, #A43931); background-image: url(/image/featured_image/{{ $blog->featured_image ? $blog->featured_image:''}});background-size: cover;height: 100%;">
            <div class="col-md-12">
                <div>
                    @if($blog->featured_image)
                    <img src="/image/featured_image/{{ $blog->featured_image ? $blog->featured_image:''}}"
                        alt="{{ Str::limit($blog->title, 10) }}" class="img-responsive featured_image"
                        style="width=300px;height=auto;">
                    @endif
                </div>
            </div>
            <h2>{{ $blog->title }}</h2>
            @if($blog->user)
            Author :<strong><a href="{{ route('users.show', $blog->user->name) }}"> {{ $blog->user->name }}
                </a></strong>| Posted:
            {{ $blog->created_at->diffForHumans()}}
            @endif
            <br>
            @if(Auth::user())
            @if(Auth::user()->role_id === 1 || Auth::user()->role_id === 2 && Auth::user()->id === $blog->user_id )
            <a class="btn btn-outline-primary btn-sm " href="{{ route('blogs_edit', $blog->id) }}"
                style='float: left;margin-right:5px;'>
                Edit</a>

            <form method="post" action="{{ route('blogs_delete', $blog->id) }}" style='float: left; '>
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-outline-danger btn-sm ">delete</button>
            </form>
            @endif
            @endif

        </div>

        <div class="col-md-12" style=" width:100%; word-wrap: break-word;">
            {!! $blog->content !!}
            <hr>
            <Strong>Categories:</Strong>
            @foreach($blog->category as $category)
            <span><a href="{{ route('categories.show',$category->slug) }}">{{$category->name}}</a></span>
            @endforeach
        </div>
    </article>
    <hr>
    <aside>
        <div id="disqus_thread"> </div>
        <script>
        (function() { 
            var d = document,
                s = d.createElement('script');
            s.src = 'https://websitename.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
        </script>
    </aside>
</div>

@endsection