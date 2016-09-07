<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    protected $fillable = [
        'content', 'created_at', 'updated_at',
    ];

    public function getEntries()
    {
        $this->hasMany('App\Entry', 'category_id');
    }

}
