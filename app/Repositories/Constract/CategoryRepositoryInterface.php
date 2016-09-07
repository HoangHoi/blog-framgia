<?php

namespace App\Repositories\Constract;

interface CategoryRepositoryInterface
{

    public function createOrUpdate($request, $id);

    public function get($category_id);

    public function findById($category_id);

    public function getAll();
}
