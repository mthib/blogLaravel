@extends('layouts/main')
@section('content')

<div>
    <h1>{{ $post->post_title }}</h1>
    <h2>{{ $post->post_category }}</h2>
    <span>{{ $post->post_content }}</span><br/>
    AUTEUR : {{ $post->author->name }}
</div>

@endsection