@extends('layouts.app')

@include('header_footer.footer')

@section('content')

<div class="container-fluid">
    <div class="jumbotron">
        <h1>Categories</h1>
    </div>



<div style="container-fluids">
    @foreach($categories as $category)
        @if($category->blog->count() > 0 )
        <a href="{{ route('categories.show', $category->slug) }}">
            <li>{{$category->name}}</li>
        </a>
        @endif
    @endforeach
</div>
</div>
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
<br>
<br>
<br>
<br>
<br>
<br>
<br>

@endsection