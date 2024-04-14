<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\Person\Comment\UpdateRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    //этот метод позволяет при обращении к контроллера автоматически будет использоваться этот метод
    public function index()
    {
        $comments = auth()->user()->comments;
        return view('person.comment.index', compact('comments'));
    }

    public function edit(Comment $comment)
    {

        return view('person.comment.edit', compact('comment'));
    }

    public function update(UpdateRequest $request,Comment $comment)
    {
        $data = $request->validated();
        $comment->update($data);
        return redirect()->route('person.comment.index');
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
        // dd($comments);
        return redirect()->route('person.comment.index');
    }
}
