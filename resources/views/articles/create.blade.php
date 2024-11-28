@extends('layouts.master')

@section('content')
    <div class="mx-auto w-2/3 flex flex-col">
        <h1 class="my-4 text-xl text-center">Créer un nouvel article</h1>

                <form action="/articles/create" method="post" enctype="multipart/form-data"
                    class="border border-gray-950 p-5 rounded-md shadow-blue-500/40 ">


                    @csrf

                    @include('partials.article-form', [
                        'type' => 'text',
                        'name' => 'title',
                        'label' => "Titre de l'article",
                        'value' => old('title'),
                        'class' => 'border border-green-700 p-2 rounded-md',
                    ])
                    {{-- <x-article-form type="text" name="title" label="Titre de l'article" value="{{ old('title') }}"
                class="custom-input-class" /> --}}

                    @include('partials.article-form', [
                        'type' => 'textarea',
                        'name' => 'body',
                        'label' => "Description de l'article",
                        'value' => old('body'),
                        'class' => 'border border-green-700 p-2 rounded-md',
                    ])

                    {{-- <x-article-form type="textarea" name="body" label="Description de l'article" value="{{ old('body') }}"
                class="textarea-class" /> --}}

                    @include('partials.article-form', [
                        'type' => 'file',
                        'name' => 'image',
                        'label' => 'Image de l\'article',
                        'value' => old('image'),
                    ])
                    {{-- <x-article-form type="file" name="image" label="Image de l'article" value="{{ old('image') }}" /> --}}

                    <div class="flex justify-between" >

                        <button type="reset" class=" mt-5 py-2 px-3 bg-red-500 text-white rounded-md">Réinitialiser</button>
                        <button type="submit" class=" mt-5 py-2 px-3 bg-blue-700 text-white rounded-md">Soumettre</button>
                    </div>
                </form>
    </div>
@endsection
