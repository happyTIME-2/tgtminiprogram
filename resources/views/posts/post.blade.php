<div class="post-item">
    <h1><a href="posts/{{$post->id}}">{{$post->title}}</a></h1>
    <p>{{ $post->user->name }} / {{ $post->created_at->toFormattedDateString() }}</p>
</div>