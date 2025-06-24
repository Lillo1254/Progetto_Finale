<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class IndexArticle extends Component
{

    use WithPagination, WithoutUrlPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        $articles = Article::paginate(6);
        return view('livewire.index-article', compact('articles'));
    }
}
