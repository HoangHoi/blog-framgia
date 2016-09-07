<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{

    protected $table = 'entries';
    protected $fillable = [
        'title', 'body', 'user_id', 'category_id', 'publish_at', 'created_at', 'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
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
