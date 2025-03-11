@extends('layouts.master')

@section('title')
    Articles
@endsection

@section('content')
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="grid gap-8">
            <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md">
                <div class="flex justify-between items-center mb-5 text-gray-500">
                    <span
                        class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded ">
                        <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                clip-rule="evenodd"></path>
                            <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
                        </svg>
                        Article
                    </span>
                    <span class="text-sm">{{ $article->created_at->diffForHumans() }}</span>
                </div>
                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 "><a
                        href="#">{{ $article['title'] }}</a></h2>
                <p class="my-5 font-light text-gray-900">{{ $article->body }}</p>

                <p class="mb-5 font-light text-gray-500 ">{{ $article->user->name }}</p>
                <div class="flex justify-between items-center">

                    <div class=" text-blue-700 mt-3 hover:underline">
                        <a href="/article/{{ $article->id }}/edit">Éditer l'article</a>
                    </div>
                    <form action="/article/{{ $article->id }}/delete" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Effacer l'article"
                            class=" text-red-500 mt-3 cursor-pointer hover:underline">
                    </form>
                </div>
                <img src="{{ asset('/public/images/5AwHDfM56CUVD28CeKYOB3bkNjvMvE0wxe6jVE5C.jpg') }}" alt="image">
            </article>
        </div>


        <div>
            <h3 class="text-xl mt-5">Commentaires</h3>
            @foreach ($article->comments as $comment)
                <div class="my-5">

                    <p><strong>{{ $comment->user->name }}</strong> a réagi :</p>
                    <p>{{ $comment->comment }}</p>
                    <p><small>{{ $comment->created_at->diffForHumans() }}</small></p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
