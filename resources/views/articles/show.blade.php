@extends('layouts.master')

@section('title')
    Articles
@endsection

@section('content')
    <div>
        <span class="font-bold">Title: </span><span>{{ $article['title'] }}</span>
    </div>
    <div>

        <span class="font-bold">Content: </span><span>{{ $article->body }}</span>
    </div>
    <div class="flex gap-5" >

        <div class="underline text-blue-700 mt-3">
            <a href="/article/{{ $article->id }}/edit">Éditer l'article</a>
        </div>
        <form action="/article/{{ $article->id }}/delete" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Effacer l'article" class="underline text-red-500 mt-3 cursor-pointer" >
        </form>
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
@endsection
