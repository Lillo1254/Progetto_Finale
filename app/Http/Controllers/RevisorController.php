<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function index()
    {
        $articles_to_check = Article::where('is_accepted', null)->first();
        return view('revisor.index', compact('articles_to_check'));

    }
    public function accept(Article $article)
    {
        $article->setAccepted(true);
        return redirect()
        ->back()
        ->with('message', "Hai accettato l'articolo  $article->title");
    }
}
    