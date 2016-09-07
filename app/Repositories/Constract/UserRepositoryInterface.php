<?php

namespace App\Repositories\Constract;

interface UserRepositoryInterface
{

    public function getEntries($user);

    public function getPublishedEntries($user);

    public function follow($user_id);

    public function unFollow($user_id);

    public function findById($user_id);
}
