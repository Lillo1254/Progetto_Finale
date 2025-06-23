<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CreateArticle extends Component
{
      public $title;
    public $price;
    public $description;

    protected $rules = [
        'title' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'description' => 'required|string',
    ];

    public function create()
    {
        $validated = $this->validate();

        Article::create([
            'title' => $validated['title'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'user_id' => Auth::id(),
        ]);

        session()->flash('success', 'Articolo creato con successo.');
        return redirect()->route('articles.index');
    }
    public function render()
    {
        return view('livewire.create-article');
    }
}
