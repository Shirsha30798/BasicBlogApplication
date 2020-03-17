@extends('layouts.app')

@include('header_footer.footer')

@section('content')



<div class="container-fluid">
    <div class="jumbotron">
        @if(Auth::user() && Auth::user()->role_id == 1)
        <h1>Admin Dashboard</h1>
        @elseif(Auth::user() && Auth::user()->role_id == 2)
        <h1>Author Dashboard</h1>
        @elseif(Auth::user() && Auth::user()->role_id == 3)
        <h1>Subscriber Dashboard</h1>
        @endif
    </div>
    @if(Auth::user() && Auth::user()->role_id == 1)
    <div class="col-md-12">

        <a href="{{ route('create_blog') }}" class="btn btn-primary btn-margin-right btn-sm blank">Create Blog</a>

        <a href="{{ route('admin_blogs') }}" class="btn btn-secondary btn-margin-right btn-sm">Publish</a>

        <a href="{{ route('categories.create') }}" class="btn btn-success btn-margin-right btn-sm">Create
            Category</a>

        <a href="{{ route('blogs_trash') }}" class="btn btn-danger btn-margin-right btn-sm">Trash</a>
        <a href="{{ route('users.index') }}" class="btn btn-warning btn-margin-right btn-sm">Manage Users</a>
        

    </div>
    @endif

    @if(Auth::user() && Auth::user()->role_id == 2)
    <div class="col-md-12">

        <a href="{{ route('create_blog') }}" class="btn btn-outline-primary btn-margin-right btn-sm">Create Blog</a>

        <a href="{{ route('categories.create') }}" class="btn btn-outline-success btn-margin-right btn-sm">Create
            Category</a>

    </div>
    @endif

    @if(Auth::user() && Auth::user()->role_id == 3)
    <div class="col-md-12">

        <a href="#" class="btn btn-outline-primary btn-margin-right btn-sm">Bhabte hobe ki korbo etar XD</a>

    </div>
    @endif
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



@endsection