<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
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
        return null;
    }

}
