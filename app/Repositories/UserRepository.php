<?php

namespace App\Repositories;

use App\Repositories\Constract\UserRepositoryInterface;
use App\User;
use App\UsersFollow;
use Auth;

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

//    public function isFollow($user_id)
//    {
//        $followed = UsersFollow::where('follower_id', Auth::user()->id)->where('followed_id', $user_id)->first();
//        if (!$followed) {
//            return false;
//        }
//        $follower = UsersFollow::where('followed_id', Auth::user()->id)->where('follower_id', $user_id)->first();
//        if (!$follower) {
//            return false;
//        }
//        return true;
//    }

    public function getFollowed()
    {
        $followed = UsersFollow::where('follower_id', Auth::user()->id)->get();
        return $followed;
    }

    public function getFollower()
    {
        $follower = UsersFollow::where('followed_id', Auth::user()->id)->get();
        return $follower;
    }

    public function getAllEntries($user)
    {
        $entries = $user->entries()->get();
        return $entries;
    }

    public function getPublishedEntries($user)
    {
        $entries = $user->entries()->where('published_at', '!=', '0000-00-00 00:00:00')->get();
        return $entries;
    }

    public function findById($user_id)
    {
        return $this->model->find($user_id);
    }

}
