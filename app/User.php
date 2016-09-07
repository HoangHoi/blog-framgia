<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\UsersFollow;
use Auth;
use App\Entry;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function entries()
    {
        return $this->hasMany('App\Entry', 'user_id');
    }

    public function isFollow($followed_id, $follower_id = null)
    {
        if ($follower_id === null) {
            $follower_id = Auth::user()->id;
        }
        if (UsersFollow::where('followed_id', $followed_id)->where('follower_id', $follower_id)->first()) {
            return true;
        }
        return false;
    }
    
    public function allowComment(Entry $entry)
    {
        $entry_owner = $entry->user()->first();
        if(Auth::user()->id == $entry_owner->id){
            return true;
        }
        return $this->isFollow($entry_owner->id);
    }
    
    public function link()
    {
        return '<a href="'.route('user.showEntries', $this->id) .'">'. $this->name .'</a>';
    }

}
