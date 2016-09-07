<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\Constract\EntryRepositoryInterface;
use App\Repositories\Constract\UserRepositoryInterface;
use Auth;

class HomeController extends Controller
{

    protected $entryRepositoryInterface;
    protected $userRepositoryInterface;

    public function __construct(EntryRepositoryInterface $entryRepositoryInterface, UserRepositoryInterface $userRepositoryInterface)
    {
        $this->entryRepositoryInterface = $entryRepositoryInterface;
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function index()
    {

        if (Auth::check()) {
            $entries = $this->userRepositoryInterface->getEntries(Auth::user());
        } else {
            $entries = $this->entryRepositoryInterface->getAllEntries();
        }
        $entries = $entries->paginate(config('common.num_entry_per_page'));
        return view('home', ['entries' => $entries]);
    }

}
