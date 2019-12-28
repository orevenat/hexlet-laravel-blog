@extends('layouts.app')

@section('content')
    <h1>Список статей</h1>
    @if (Session::has('status'))
        {{ Session::get('status') }}
    @endif

    <a href="{{ route('articles.create') }}">Создать статью</a>

    @foreach ($articles as $article)
        <h2>
            <a href="{{ route('articles.show', $article) }}">
                {{ $article->name }}
            </a>

        </h2>
        <div>{{Str::limit($article->body, 200)}}</div>
        <a href="{{ route('articles.edit', $article) }}">Редактировать</a>
        <br><br>
    @endforeach
@endsection
