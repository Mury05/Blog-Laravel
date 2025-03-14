<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $articles = Article::with('user')->orderBy("created_at", "desc")->get();

        return view('articles.articles', compact('articles'));
    }

    public function create()
    {
        $this->authorize('create', Article::class);
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Article::class);

        // vérification des permissions plus tard
        $user = Auth::user();
        $request['user_id'] = $user->id;
        $validatedData = $request->validate([
            '_token' => 'required|string',
            'title' => 'required|string',
            'body' => 'required|string',
            'user_id' => 'required|numeric|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $validatedData['image'] = $request->file('image')->store('images', 'public');
        // dd($validatedData);
        Article::create($validatedData);
        return redirect('/articles')->with(['success_message' => 'L\'article a été crée !']);

    }

    public function show($id)
    {
        $article = Article::with('user')->with([
            'comments' => function ($q) {
                $q->with('user');
            }
        ])->findOrFail($id);

        // $article = Article::with('user')->where('id', $id)->firstOrFail();
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $this->authorize('update', $article);

        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        // vérification des permissions plus tard
        // validation
        $this->authorize('update', $article);


        $article->update($request->all());
        return redirect('/articles')->with(['success_message' => 'L\'article a été modifié !']);

    }

    public function delete(Article $article)
    {
        $this->authorize('delete', $article);

        // vérification des permissions plus tard
        $article->delete();
        return redirect('/articles')->with(['success_message' => 'L\'article a été supprimée !']);
    }
}
