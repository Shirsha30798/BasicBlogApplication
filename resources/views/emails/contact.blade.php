@extends('layouts.app')

@section('content')

@include('partials.tinymce')


<div class="container-fluid">

    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Contact Page</h1>
        </div>

        <div class="col-sm-8 offset-md-2">

            <form action="{{ route('mail_send') }}" method="POST" enctype="multipart/form-data">
                @include('partials.error-message')
                @csrf

                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" name="name" class="form-control" value ="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value ="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" class="form-control" value ="{{ old('subject') }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <textarea name="mail_message" class="form-control" value ="{{ old('mail_message') }}"></textarea>
                </div>
                <div>
                    <button class="btn btn-outline-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection