@extends('layouts/main')
@section('content')
<h1>Création d'un article</h1>

<form action="{{ url('adminArticles') }}" method="POST">
    {{ csrf_field() }}

    <div class="form-group">
        <input type="text"
        class="form-control {{ $errors->has('post_title') ? 'is-invalid' : '' }}"
        name="post_title" id="post_title" placeholder="Titre" value="{{ old('post_title') }}">
        {!! $errors->first('post_title', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <select name="post_category" id="post_category">
            @foreach ($categories as $category)
                <option value="{{ $category->post_category }}">{{ $category->post_category }}</option>
            @endforeach
        </select>

        {{-- <input type="text"
        class="form-control {{ $errors->has('post_category') ? 'is-invalid' : '' }}"
        name="post_category" id="post_category" placeholder="Catégorie" value="{{ old('post_category') }}">
        {!! $errors->first('post_category', '<div class="invalid-feedback">:message</div>') !!} --}}
    </div>
    <div class="form-group">
        <textarea
        class="form-control {{ $errors->has('post_content') ? 'is-invalid' : '' }}"
        name="post_content" id="post_content" rows="10"
        placeholder="Contenu de l'article">{{ old('post_content') }}</textarea>
        {!! $errors->first('post_content', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <button type="submit" class="btn btn-secondary">Envoyer !</button>
</form>

@endsection