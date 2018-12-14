@extends('layout.layout')

@section('content')
    <h1>{{$post->title}}</h1>
    <p>{{$post->created_at}}</p>
    <hr>
    {{$post->body}}
    <hr>
    <div class="comments">
        <ul class="list-group">
            @foreach($post->comments as $comment)
                <li class="list-group-item">
                    <strong>{{ $comment->created_at->diffForHumans() }}</strong>
                    {{ $comment->body }}
                </li>
            @endforeach
        </ul>
    </div>
    <hr>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="/posts/{{ $post->id }}/comments">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea name="body" placeholder="Your comment here." class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
            </form>

            @include('layout.error')
        </div>
    </div>
@endsection