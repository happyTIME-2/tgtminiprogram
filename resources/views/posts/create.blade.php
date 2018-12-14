@extends('layout.layout');

@section('content')
    <h1>Create a post</h1>
    <hr>
    <form method="POST" action="/posts">
        {{csrf_field()}}
        <div class="form-group">
            <label for="exampleInputEmail1">Title:</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Body:</label>
            <textarea class="form-control" id="body" name="body"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Publish</button>
    </form>
@endsection
