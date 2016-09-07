<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{

    protected $table = 'entries';
    protected $fillable = [
        'title', 'body', 'user_id', 'category_id', 'published_at', 'created_at', 'updated_at',
    ];
    protected $dates = ['published_at', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function categoryLink()
    {
        $category = $this->category()->first();
        return '<a href="' . route('category.show', $category->id) . '">' . $category->content . '</a>';
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'entry_id');
    }

    public function published()
    {
        if ($this->published_at != '0000-00-00 00:00:00') {
            return true;
        }
        return false;
    }

}
