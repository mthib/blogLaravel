@extends('layouts/main')
@section('content')

<div>
    <h1>{{ $post->post_title }}</h1>
    <h2>{{ $post->post_category }}</h2>
    <span>{{ $post->post_content }}</span><br/>
    <h3>AUTEUR : {{ $post->author->name }}</h3>
</div>
<div>
    @if (count($comments) > 0) <h2>Commentaires</h2>@endif
    @foreach ( $comments as $comment )
    <div> 
        <h4>{{ $comment->comment_name }}</h4>
        <span>{{ $comment->comment_content }}</span>
    </div>
    @endforeach

<h3>Ajouter un commentaire</h3>
<form action="/handigital/blogLaravel/public/articles/{{$post->post_name}}" method="POST">
    {{ csrf_field()}}
    <input type="hidden" name="post_id" value="{{$post->id}}"/>
    <div>
        <input type="text" name="comment_name" placeholder="Nom">
    </div>
    <div>
        <input type="text" name="comment_email" placeholder="Email">
    </div>
    <div>
        <textarea name="comment_content" placeholder="Description"></textarea>
    </div>
    <div>
        <button type="submit">Ajouter le commentaire</button>
    </div>
</form>
@endsection