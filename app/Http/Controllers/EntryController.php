<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Constract\EntryRepositoryInterface;
use App\Http\Requests\EntryRequest;
use Auth;
use Carbon\Carbon;
use App\Http\Requests\CommentRequest;

class EntryController extends Controller
{

    protected $entryRepositoryInterface;

    public function __construct(EntryRepositoryInterface $entryRepositoryInterface)
    {
        $this->entryRepositoryInterface = $entryRepositoryInterface;
    }

    public function index()
    {
        return 'ok';
    }

    public function store(EntryRequest $request)
    {
        if ($request->published == 1) {
            $request->published_at = Carbon::now();
        } else {
            $request->published_at = 0;
        }
        $this->entryRepositoryInterface->create($request);
        return '["success"=>"' . trans('create_entry_success') . '"]';
    }

    public function comment(CommentRequest $request)
    {
        $entry = $this->entryRepositoryInterface->findWithId($request->entry_id);
        if (Auth::user()->allowComment($entry)) {
            $request->user_id = Auth::user()->id;
            if ($entry) {
                $this->entryRepositoryInterface->comment($request);
            }
            return redirect()->route('entry.show', $request->entry_id);
        }
        return redirect()->route('home');
    }

    public function publish(Request $request)
    {
        if ($this->entryRepositoryInterface->findWithId($request->entry_id)) {
            $time = Carbon::now();
            $this->entryRepositoryInterface->publish($request->entry_id, $time);
            return redirect()->route('entry.show', $request->entry_id);
        }
        return redirect()->route('home');
    }

    public function show($id)
    {
        $entry = $this->entryRepositoryInterface->getEntry($id);
        if (!$entry) {
            return abort(404);
        }
        return view('page.entry', ['entry' => $entry]);
    }

    public function update(EntryRequest $request)
    {
        if ($request->published == 1) {
            $request->published_at = Carbon::now();
        } else {
            $request->published_at = 0;
        }
        if ($this->entryRepositoryInterface->update($request)) {
            return '["success"=>"' . trans('create_entry_success') . '"]';
        }
        return '["error"=>"' . trans('create_entry_success') . '"]';
    }

    public function destroy(Request $request)
    {
        if ($this->entryRepositoryInterface->deleteWithId($request->entry_id)) {
            return redirect()->route('user.showEntries', Auth::user()->id);
        }
        return redirect()->route('user.showEntries', Auth::user()->id);
    }

}
