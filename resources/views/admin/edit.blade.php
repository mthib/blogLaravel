@extends('layouts/main')
@section('content')
<h1>Edition de l'article</h1>

<form action="{{ url("adminArticles",[$post->id])}}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT')}}
    <div class="form-group">
        <input type="text"
        class="form-control {{ $errors->has('post_title') ? 'is-invalid' : '' }}"
        name="post_title" id="post_title" placeholder="Titre" value="{{ $post->post_title }}">
        {!! $errors->first('post_title', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <select name="post_category" id="post_category">
            @foreach ($categories as $category)
                <option value="{{ $category->post_category }}"
                    @if ($category->post_category == $post->post_category) {{ "selected" }} @endif
                >{{ $category->post_category }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <textarea
        class="form-control {{ $errors->has('post_content') ? 'is-invalid' : '' }}"
        name="post_content" id="post_content" rows="10"
        placeholder="Contenu de l'article">{{ $post->post_content }}</textarea>
        {!! $errors->first('post_content', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <button type="submit" class="btn btn-secondary">Envoyer !</button>
</form>

@endsection