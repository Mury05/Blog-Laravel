@extends('layouts.master')

@section('title')
Articles
@endsection

@section('content')
<div class="flex justify-between items-center mt-6" >
    <h2 class="text-xl m-6" >Articles</h2>
    <a href="/articles/create">
        <button class="p-3 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700">
            New Article
        </button>
    </a>
</div>
{{--
@if($articles)
    @foreach($articles as $article)
        @include('articles.index')
    @endforeach
@else
    @include('articles.no-articles')
@endif -->

<!-- @unless(!$articles)
    @foreach ($articles as $article)
        @include('articles.index')
    @endforeach

@endunless -->

<!-- @forelse($articles as $article)
    @include('articles.index')
@empty
    @include('articles.no-articles')
@endforelse

@for ($i = 0; $i < 10; $i++)
<p>Je suis canon !</p>
@endfor
{{--  @while (true)
<p>Je suis canon !</p>

@endwhile --}}
@each('partials.article', $articles, 'article', 'partials.no-articles')
@endsection
