@extends('layouts.master')

@section('title')
    Éditer l'article {{ $article->title }}
@endsection

@section('content')
    <div class="mx-auto w-2/3 flex flex-col">
        <h1 class="my-4 text-xl text-center">Éditer l'article {{ $article->title }}</h1>

        <form action="/article/{{ $article->id }}/edit" method="POST" enctype="multipart/form-data"
            class="border border-gray-950 p-5 rounded-md shadow-blue-500/40 ">
            @csrf
            @method('put')
            @include('partials.article-form', [
                'type' => 'text',
                'name' => 'title',
                'label' => "Titre de l'article",
                'value' => $article->title,
                'class' => 'border border-green-700 p-2 rounded-md',
            ])
            @include('partials.article-form', [
                'type' => 'textarea',
                'name' => 'body',
                'label' => "Description de l'article",
                'value' => $article->body,
                'class' => 'border border-green-700 p-2 rounded-md ',
            ])
            @include('partials.article-form', [
                'type' => 'file',
                'name' => 'image',
                'label' => 'Image de l\'article',
                'value' => old('image'),
            ])
            <div class="flex justify-between" >

                <button type="reset" class=" mt-5 py-2 px-3 bg-red-500 text-white rounded-md">Réinitialiser</button>
                <button type="submit" class=" mt-5 py-2 px-3 bg-blue-700 text-white rounded-md">Modifier</button>
            </div>
        </form>
    </div>
@endsection
