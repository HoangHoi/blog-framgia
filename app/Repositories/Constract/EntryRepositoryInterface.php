<?php

namespace App\Repositories\Constract;

interface EntryRepositoryInterface
{

    public function getAllEntries();

    public function findWithId($id);

    public function deleteWithId($id);

    public function create($request);

    public function publish($id, $time);

    public function comment($request);

    public function getEntry($id);

    public function update($request);
}
