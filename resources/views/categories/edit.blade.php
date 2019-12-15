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
            

        </form>
    </div>

</div>

@endsection