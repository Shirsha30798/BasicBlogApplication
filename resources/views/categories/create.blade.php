@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="jumbotron">
        <h1>Create a new category</h1>
    </div>

    <div class="col-md-12">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <button class="btn btn-outline-primary" type="submit">Create</button>


        </form>

        <br>

        @if(Session::has('category_exists'))
        <div class="alert alert-success" style>
            {{ Session::get('category_exists') }}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
        @endif
    </div>

</div>

@endsection