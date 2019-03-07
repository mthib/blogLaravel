@extends('layouts/main')
@section('content')
<h1>Articles</h1>
<ul>
    @foreach ( $posts as $post )
        <li>
            <a href="{{ url("adminArticles",[$post->id])}}">{{ $post->post_title }}</a>
            <a href="{{ url("adminArticles")}}/{{ $post->id }}/edit"><button>Editer</button></a>     
            <form action="{{ url("adminArticles",[$post->id])}}" method="post">
                <input type="submit" value="Delete" />
                {{ method_field('DELETE')}}
                {!! csrf_field() !!}
            </form>
        </li>
    @endforeach
</ul>
<a href="{{ url("adminArticles")}}/create"><button>Créer un article</button></a>
@endsection