<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersFollow extends Model
{

    protected $table = 'users_follows';
    protected $fillable = [
        'follower_id', 'followed_id',
    ];

}
