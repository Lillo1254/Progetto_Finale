<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use phpDocumentor\Reflection\Types\Boolean;

class Article extends Model
{

    use Searchable;
    protected $fillable =[ 'title', 'price', 'description', 'user_id', 'category_id','is_accepted' ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
{
    return $this->belongsTo(Category::class);
}
   public function setAccepted($value)
{
    $this->is_accepted = $value;
    $this->save();
}

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
        ];                          
    }
}
