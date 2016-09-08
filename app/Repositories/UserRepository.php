<?php

namespace App\Repositories;

use App\Repositories\Constract\UserRepositoryInterface;
use App\User;
use App\UsersFollow;
use Auth;
use App\Entry;

class UserRepository implements UserRepositoryInterface
{

    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function follow($user_id)
    {
        if ($this->model->find($user_id)) {
            $userFollow = new UsersFollow;
            $userFollow->follower_id = Auth::user()->id;
            $userFollow->followed_id = $user_id;
            return $userFollow->save();
        }
        return false;
    }

    public function unFollow($user_id)
    {
        $follows = UsersFollow::where('follower_id', Auth::user()->id)->where('followed_id', $user_id)->get();
        foreach ($follows as $follow) {
            $follow->delete();
        }
    }

    public function getEntries($user)
    {
        $followed_users = $user->followed()->get();
        $arr_followed_user = [];
        $arr_followed_user[] = $user->id;
        foreach ($followed_users as $followed_user) {
            $arr_followed_user[] = $followed_user->id;
        }
        $entries = Entry::where('published_at', '!=', '0000-00-00 00:00:00')
                        ->whereIn('user_id', $arr_followed_user)
                        ->orderBy('published_at', 'desc');
        return $entries;
    }
    
    public function getYourEntries($user)
    {
        return $user->entries();
    }

    public function getPublishedEntries($user)
    {
        $entries = $user->entries()
                        ->where('published_at', '!=', '0000-00-00 00:00:00')
                        ->orderBy('published_at', 'desc');
        return $entries;
    }

    public function findById($user_id)
    {
        return $this->model->find($user_id);
    }

}
