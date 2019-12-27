@extends('layouts.app')

@section('content')
    <h1>Список статей</h1>
    @if (Session::has('status'))
        {{ Session::get('status') }}
    @endif
    @foreach ($articles as $article)
        <h2>
            <a href="{{ route('articles.show', $article) }}">
                {{ $article->name }}
            </a>
        </h2>
        <div>{{Str::limit($article->body, 200)}}</div>
    @endforeach
@endsection
