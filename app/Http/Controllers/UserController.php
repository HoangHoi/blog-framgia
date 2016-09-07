<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\Constract\UserRepositoryInterface;
use App\Http\Requests\FollowRequest;
use Auth;

class UserController extends Controller
{

    protected $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    public function showEntries($user_id)
    {
        $user = $this->userRepositoryInterface->findById($user_id);
        if (Auth::check() && $user_id == Auth::user()->id) {
            $entries = $this->userRepositoryInterface->getAllEntries($user);
        } else {
            $entries = $this->userRepositoryInterface->getPublishedEntries($user);
        }
        return view('page.userEntries', ['user' => $user, 'entries' => $entries]);
    }

    public function follow(FollowRequest $request)
    {
        switch ($request->action) {
            case 'follow':
                $this->userRepositoryInterface->follow($request->user_id);
                break;
            case 'unfollow':
                $this->userRepositoryInterface->unFollow($request->user_id);
                break;
        }
        return redirect()->route('user.showEntries', $request->user_id);
    }

}
