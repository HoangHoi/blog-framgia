<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{

    protected $table = 'entries';
    protected $fillable = [
        'title', 'body', 'user_id', 'category_id', 'publish_at', 'created_at', 'updated_at',
    ];

}
