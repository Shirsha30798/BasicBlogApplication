@extends('layouts.app')

@section('content')

@include('partials.tinymce')


<div class="container-fluid">
    <div class="jumbotron">
        <h1>Create a new Blog</h1>
    </div>

    <div class="col-md-12">
    
        <form action="{{ route('blogs_store') }}" method="POST" enctype="multipart/form-data">
            @include('partials.error-message')
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text"  name="title" class="form-control" value ="{{ old('title') }}" >
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" rows="10" class="form-control" value ="{{ old('content') }}" ></textarea>
            </div>

            <div class=" form-check form-check-inline ">
                @foreach($categories as $category)
                <input type="checkbox" value="{{ $category->id }}" name="category_id[]" class="form-check-input">
                <label class="form-check-label" style="padding-right:3px;">{{ $category->name }} </label>
                @endforeach
            </div>

            <div class="file-field">
                <input type="file" name="featured_image">
            </div>
            <br>
            <div>
                <button class="btn btn-outline-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>

</div>

@endsection