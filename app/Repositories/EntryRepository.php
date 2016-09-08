<?php

namespace App\Repositories;

use App\Repositories\Constract\EntryRepositoryInterface;
use App\Entry;
use App\Comment;
use Auth;

class EntryRepository implements EntryRepositoryInterface
{

    protected $model;

    public function __construct(Entry $entry)
    {
        $this->model = $entry;
    }

    public function create($request)
    {
        $entry = new Entry;
        $entry->title = $request->title;
        $entry->body = $request->body;
        $entry->user_id = Auth::user()->id;
        $entry->category_id = $request->category_id;
        $entry->published_at = $request->published_at;
        return $entry->save();
    }

    public function update($request)
    {
        $entry = $this->model->find($request->id);
        if($entry){
            return false;
        }
        $entry->title = $request->title;
        $entry->body = $request->body;
        $entry->category_id = $request->category_id;
        return $entry->save();
    }
    
    public function publish($id, $time)
    {
        $entry = $this->model->find($id);
        if ($entry) {
            $entry->published_at = $time;
            $entry->save();
            return true;
        }
        return false;
    }

    public function getAllEntries()
    {
        $entries = $this->model->where('published_at', '!=', '0000-00-00 00:00:00');
        return $entries;
    }

    public function findWithId($id)
    {
        return $this->model->find($id);
    }

    public function deleteWithId($id)
    {
        $entry = $this->model->find($id);
        if ($entry && $entry->isYourEntry()) {
            $entry->delete();
            return true;
        }
        return false;
    }

    public function comment($request)
    {
        $comment = new Comment;
        $comment->content = $request->content;
        $comment->user_id = $request->user_id;
        $comment->entry_id = $request->entry_id;
        return $comment->save();
    }

    public function getEntry($id)
    {
        $entry = $this->findWithId($id);
//        $entry->f_comments = [];
        $f_comments = [];
        if (!$entry) {
            return false;
        }
        $comments = $entry->comments()->get();
        foreach ($comments as $comment) {
            $comment_user = $comment->user()->first();
            if (!$comment_user) {
                $comment->delete();
            } else {
                $comment->user_owner = $comment_user;
                $f_comments[] = $comment;
//                $entry->f_comments[] = $comment;
            }
        }
        $entry->f_comments = $f_comments;
        return $entry;
    }

}
