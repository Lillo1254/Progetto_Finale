<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateArticle extends Component
{
    public $title;
    public $price;
    public $description;
    public $category_id;  

    protected $rules = [
        'title' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'description' => 'required|string',
        'category_id' => 'required|exists:categories,id',  
    ];

    public function create()
    {
        $validated = $this->validate();

        Article::create([
            'title' => $validated['title'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'user_id' => Auth::id(),
            'category_id' => $validated['category_id'],
        ]);

        session()->flash('success', 'Articolo creato con successo.');
        return redirect()->route('article.catalogo');
    }

    public function render()
    {
        return view('livewire.create-article', ['categories' => Category::all()]);
    }
}
