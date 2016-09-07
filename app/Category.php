<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    protected $fillable = [
        'content', 'created_at', 'updated_at',
    ];

    public function entries()
    {
        return $this->hasMany('App\Entry', 'category_id')->orderBy('published_at','desc');
    }

    public function entriesPublished()
    {
        return $this->entries()->where('published_at', '!=', '0000-00-00 00:00:00')->orderBy('published_at','desc');
    }
}
