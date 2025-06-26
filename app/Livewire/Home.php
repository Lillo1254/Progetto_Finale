<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class Home extends Component
{
    public $articles; 

    public function mount() {
        $this->articles = Article::where('is_accepted', true)->latest()->take(6)->get(); 
    }
    
    public function render()
    {
        return view('livewire.home', ['articles' => $this->articles]);
    }
}

