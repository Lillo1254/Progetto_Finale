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
        'description' => 'required|string|max:500',
        'category_id' => 'required|exists:categories,id',  
    ];

    protected $messages = [
        'title.required' => 'Il titolo dell\'articolo è obbligatorio.',
        'price.required' => 'Il prezzo dell\'articolo è obbligatorio e non deve essere minore di 0.',
        'description.required' => 'La descrizione dell\'articolo è obbligatoria e deve contere almeno 8 caratteri ed un massimo di 500.',
        'category_id.required' => 'Seleziona una categoria di appartenenza.',
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

        session()->flash('message', 'Articolo creato con successo.');
        return redirect()->route('article.catalogo');
    }

    public function render()
    {
        return view('livewire.create-article', ['categories' => Category::all()]);
    }
}
