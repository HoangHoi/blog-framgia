<?php

namespace App\Repositories\Constract;

interface EntryRepositoryInterface
{

    public function getAllEntry();

    public function findWithId($id);

    public function deleteWithId($id);

    public function createOrUpdate($request, $id);

    public function publish($id, $time);

    public function comment($request);

    public function getEntry($id);
}
