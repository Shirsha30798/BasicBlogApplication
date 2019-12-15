@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="jumbotron">
        <h1>Manage Users</h1>
    </div>

    <div class="col-md-12">

        @foreach($users as $user)
        <div class="row">
            <form class="form-row mr-1" action="{{ route('users.update', $user->id) }}" method="post"
                style="float: left;">
                @csrf
                @method('patch')
                <div class="form-group">
                    <!--<input class="form-control" value="{{ $user->name }}" disabled>-->
                    <label style="border-style: none;" class="form-control mr-4 " for="name" >{{ $user -> name }}</label>
                </div>
                <div class="form-group ">
                    <select name="role_id" class="form-control">
                        <option selected>{{ $user->role->name }}</option>
                        <option value="2">author</option>
                        <option value="3">subscriber</option>
                    </select>
                </div>
                <div class="form-group">
                    <label style="border-style: none;" class="form-control" for="email">{{ $user -> email }}</label>
                </div>
                <div class="form-group mr-1">
                    <label style="border-style: none;" class="form-control"
                        for="created_at">{{ $user -> created_at->diffforHumans() }}</label>
                </div>
                <span class="input-group-btn">
                <button class="btn btn-outline-primary btn-xs form-group">Update</button>
                </span>
            </form>
            <form action="{{ route('users.destroy', $user) }}" method="post" style="float: left;">
                @csrf
                @method('delete')
                <button class="btn btn-outline-danger btn-xs" type="submit">Delete</button>
            </form>
        </div>
        <br>
        @endforeach

    </div>

</div>

@endsection