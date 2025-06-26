<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function revisorProfile()
    {
        $articles_to_check = Article::where('is_accepted', null)->orderby('created_at', 'asc')->get();
        return view('revisor.index', compact('articles_to_check'));
    }
    public function accept(Article $article)
    {
        $article->setAccepted(true);
        return redirect()
            ->back()
            ->with('message', "Hai accettato l'articolo  $article->title");
    }
    public function reject(Article $article)
    {
        $article->setAccepted(false);
        return redirect()
            ->back()
            ->with('message', "Hai rifiutato l'articolo  $article->title");
    }


    // EXTRA

    public function showDecline() {
        $articles = Article::where('is_accepted', false)->get();
        
            return view('revisor.articledecline', compact('articles'));
        
    }
    public function annulla(Article $article)
    {
        if ($article->is_accepted === false) {
            $article->setAccepted(null);
            return redirect()->back()->with('message', "Hai annullato il rifiuto dell'articolo \"$article->title\"");
        }

        return redirect()->back()->with('error', "L'articolo non è stato rifiutato, quindi non può essere annullato.");
    }
}
