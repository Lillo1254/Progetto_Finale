<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Searchable;

    protected $fillable = ['name', 'description'];  // CORRETTO NOME COLONNA

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

     public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            
        ];                          
    }
}
