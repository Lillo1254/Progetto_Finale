<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('articles.catalogo');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article = Article::findOrFail($article->id);

        if ($article->is_accepted == true) {
            return view('articles.show', compact('article'));
        }
        return redirect()->route('profile', auth()->user())->with('message', 'Il tuo articolo è in fase di revisione.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        abort_if($article->user_id !== auth()->id(), 403, 'Non sei autorizzato ad accedere a questa pagina.');
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        abort_if($article->user_id !== auth()->id(), 403, 'Non sei autorizzato ad accedere a questa pagina.');

        $article->update($request->validated());

        return redirect()->route('article.show', $article)->with('message', 'Articolo aggiornato con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        abort_if($article->user_id !== auth()->id(), 403, 'Non sei autorizzato ad accedere a questa pagina.');

        $article->delete();

        return redirect()->route('article.catalogo')->with('message', 'Articolo eliminato con successo.');
    }

    public function showcategory(Category $category)
    {


        $articles = $category->articles()->where('is_accepted', true)->get();
        $categoryName = $category->name;
        return view('articles.categories', compact('articles', 'categoryName'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $articles = Article::search($query)->get();
        return view('articles.search', compact('articles', 'query'));
    }
}
