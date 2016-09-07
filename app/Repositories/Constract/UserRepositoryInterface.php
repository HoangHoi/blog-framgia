<?php

namespace App\Repositories\Constract;

interface UserRepositoryInterface
{

    public function getAllEntries($user);
    
    public function getPublishedEntries($user);

    public function follow($user_id);

    public function unFollow($user_id);

//    public function isFollow($user_id);

    public function getFollowed();

    public function getFollower();

    public function findById($user_id);
}
