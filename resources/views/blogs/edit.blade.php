@extends('layouts.app')

@section('content')

@include('partials.tinymce')

<div class="container-fluid">
    <div class="jumbotron">
        <h1>Edit Blog</h1>
    </div>

    <div class="col-md-12">
        <form action="{{ route('blogs_update', $blog->id) }}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" rows="10" class="form-control" required>{{ $blog->content }}</textarea>
            </div>
            <div class="form-group form-check form-check-inline">
            {{ $blog->category->count() ? 'Current Categories:' : ''}} &nbsp;
                @foreach($blog->category as $category)
                <input type="checkbox" value="{{ $category->id }}" name="category_id[]" class="form-check-input" checked>
                <label class="form-check-label" style="padding-right:3px;">{{ $category->name }} </label>
                @endforeach
            </div>
            <div class="form-group form-check form-check-inline">
            {{ $filtered->count() ? 'Update category:' : ''}} &nbsp;
                @foreach($filtered as $category)
                <input type="checkbox" value="{{ $category->id }}" name="category_id[]" class="form-check-input">
                <label class="form-check-label" style="padding-right:3px;">{{ $category->name }} </label>
                @endforeach
            </div>
            <div class="file-field">
                <input type="file" name="featured_image">
            </div>
            <br>
            <div>
            <button class="btn btn-primary" type="submit">Update</button>
            </div>

        </form>
    </div>

</div>

@endsection