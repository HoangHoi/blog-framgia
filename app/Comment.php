<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'comments';
    protected $fillable = [
        'content', 'user_id', 'entry_id', 'created_at', 'updated_at',
    ];

}
