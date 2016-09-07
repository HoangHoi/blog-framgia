<?php

namespace App\Repositories;

use App\Repositories\Constract\CategoryRepositoryInterface;
use App\Category;

class CategoryRepository implements CategoryRepositoryInterface
{

    protected $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function createOrUpdate($request, $id = null)
    {
        $category = $this->model->findOrNew($id);
        $category->content = $request->content;
        return $category->save();
    }

    public function get($category_id)
    {
        $result = [];
        $category = $this->findById($category_id);
        if (!$category) {
            return false;
        }
        $result['category'] = $category;
        $entries = $category->entriesPublished()->get();
        $result['entries'] = $entries;
        return $result;
    }

    public function findById($category_id)
    {
        return $this->model->find($category_id);
    }

    public function getAll()
    {
        $categories = $this->model->all();
        return $categories;
    }

}
