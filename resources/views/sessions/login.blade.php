@extends('layout.layout')

@section('content')
    <h1>Login</h1>
    <hr>
    <form method="POST" action="/posts/login">
        {{csrf_field()}}

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Login</button>

        @include('layout.error')
    </form>
@endsection
