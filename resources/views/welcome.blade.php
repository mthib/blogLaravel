@extends('layouts/main')
@section('content')

@foreach ( $posts as $post )
    <div>
        <a href="{{ url('articles/'.$post->post_name) }}"><h1>{{ $post->post_title }}</h1></a>
        <h2>{{ $post->post_category }}</h2>
        <span>{{ $post->post_content }}</span>
    </div>
@endforeach

@endsection