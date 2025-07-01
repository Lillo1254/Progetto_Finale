<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateArticle extends Component
{
    use WithFileUploads;

    public $images = [];
    public $temporary_image;

    public $article;
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

//     protected function cleanForm()
// {
//     $this->title = '';
//     $this->price = '';
//     $this->description = '';
//     $this->category_id = '';
//     $this->images = [];
//     $this->temporary_image = null;
// }

    public function create()
    {
        $validated = $this->validate();

        $this->article = Article::create([
            'title' => $validated['title'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'user_id' => Auth::id(),
            'category_id' => $validated['category_id'],
        ]);
        if (count($this->images) > 0) {
            foreach ($this->images as $image) {
                $newFileName="articles/{$this->article->id}";
               $newImage=$this->article->images()->create(['path' => $image->store($newFileName, 'public')]);
                dispatch(new ResizeImage($newImage ->path, 300, 300));
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }    
                

        return redirect(route('article.create'))->with('message', 'Articolo creato con successo.');

        // $this->cleanForm();
    }

    public function updatedTemporaryImage() {
        if($this->validate([
            'temporary_image.*' => 'image|mimes:jpeg,jpg,png|max:2048',
            'temporary_image' => 'max:6',
        ])) {
           foreach ($this->temporary_image as $image) {
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
