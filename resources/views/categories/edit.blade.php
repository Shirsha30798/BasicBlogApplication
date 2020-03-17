@extends('layouts.app')

@section('content')

@include('partials.tinymce')

<div class="container-fluid">
    <div class="jumbotron">
        <h1>Edit category</h1>
    </div>

    <div class="col-md-12">
        <form action="{{ route('categories.update', $category->id) }}"  method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}">
            </div>
            <button class="btn btn-outline-primary" type="submit">Update</button>
            <a class="btn btn btn-outline-danger btn-margin-right blank" href="{{ route('categories.index') }}">Back</a>
        </form>
        <br>
        
        <br><br>
        @if(Session::has('category_exists'))
        <div class="alert alert-success" style>
            {{ Session::get('category_exists') }}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
        @endif
    </div>

</div>

@endsection