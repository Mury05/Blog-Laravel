@extends('layouts.master')

@section('title')
    Articles
@endsection

@section('content')
    <div class="flex justify-between items-center mx-5 mt-6">
        <h2 class="text-2xl font-bold m-6">Articles</h2>
        {{-- @can('see-admin-menu')
            <a href="/articles/create">
                <button class="p-3 bg-blue-500 text-white font-medium rounded-md hover:bg-blue-700">
                    New Article
                </button>
            </a>
        @endcan --}}
        @auth
            @if (auth()->user()->can('create', 'App\\Models\Article'))
                <a href="/articles/create">
                    <button class="p-3 bg-blue-500 text-white font-medium rounded-md hover:bg-blue-700">
                        New Article
                    </button>
                </a>
            @endif
        @endauth
    </div>
    {{--
@if ($articles)
    @foreach ($articles as $article)
        @include('articles.index')
    @endforeach
@else
    @include('articles.no-articles')
@endif -->

<!-- @unless (!$articles)
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



    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="grid gap-8 lg:grid-cols-4">
            @each('partials.article', $articles, 'article', 'partials.no-articles')
        </div>
    </div>
@endsection
