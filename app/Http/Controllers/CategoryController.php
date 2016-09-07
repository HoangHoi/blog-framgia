<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\Constract\CategoryRepositoryInterface;

class CategoryController extends Controller
{

    private $categoryRepositoryInterface;

    public function __construct(CategoryRepositoryInterface $categoryRepositoryInterface)
    {
        $this->categoryRepositoryInterface = $categoryRepositoryInterface;
    }

    public function show($category_id = null)
    {
        if ($category_id == null) {
            return $this->showAll();
        }
        $data = $this->categoryRepositoryInterface->get($category_id);
        $data['entries'] = $data['entries']->paginate(config('common.num_entry_per_page'));
        return view('page.category', $data);
    }

    public function showAll()
    {
        return redirect()->route('home');
    }

}
