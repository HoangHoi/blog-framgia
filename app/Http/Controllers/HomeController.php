<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\Constract\EntryRepositoryInterface;

class HomeController extends Controller
{

    protected $entryRepositoryInterface;

    public function __construct(EntryRepositoryInterface $entryRepositoryInterface)
    {
        $this->entryRepositoryInterface = $entryRepositoryInterface;
    }

    public function index()
    {
        $entries = $this->entryRepositoryInterface->getAllEntry();
        return view('home', ['entries' => $entries]);
    }

}
