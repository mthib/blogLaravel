@extends('layouts/main')
@section('content')
<h1>Articles</h1>
<ul>
    @foreach ( $posts as $post )
        <li><a href="/handigital/blogLaravel/public/articles/{{ $post->post_name }}">{{ $post->post_title }}</a></li>
    @endforeach
</ul>
@endsection