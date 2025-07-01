<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateArticle extends Component
{
    use WithFileUploads;

    public $images = [];
    public $temporary_image;

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
        'temporary_image.*.image' => 'Il file deve essere un\'immagine in formato jpeg, png, jpg, gif, svg o webp.',
        'temporary_images.*.max' => 'il file non deve essere superiore a a 2MB',
        
    ];

    protected function cleanForm()
{
    $this->title = '';
    $this->price = '';
    $this->description = '';
    $this->category_id = '';
    $this->images = [];
    $this->temporary_image = null;
}

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
        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                $this->article->images()->create(['path' => $image->store('images', 'public')]);
            }
        }    
                

        session()->flash('message', 'Articolo creato con successo.');
        return redirect()->route('article.catalogo');

        $this->cleanForm();
    }

    public function updateTemporaryImages() {
        if($this->validate([
            'temporary_image.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'temporary_images' => 'max:6',
        ])) {
           foreach ($this->temporary_images as $image) {
               $this->images[] = $image;
           }
        }
    }

    public function removeImg($key) {
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }

    public function render()
    {
        return view('livewire.create-article', ['categories' => Category::all()]);
    }
}
