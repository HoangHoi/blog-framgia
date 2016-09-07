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
            $followed_user = Auth::user()->followed()->get();
            $entries = $this->userRepositoryInterface->getEntries(Auth::user());
            foreach ($followed_user as $f_user) {
                $entries = $entries->merge($this->userRepositoryInterface->getEntries($f_user));
            }
        } else {
            $entries = $this->entryRepositoryInterface->getAllEntries();
        }
        return view('home', ['entries' => $entries]);
    }

}
