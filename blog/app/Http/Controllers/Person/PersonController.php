<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostUserLike;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    //этот метод позволяет при обращении к контроллера автоматически будет использоваться этот метод
    public function index()
    {
        $data = [];
        $data['likedCount'] = auth()->user()->likedPosts()->count();
        // dd($data);
        // $data['commentedCount'] = Comment::all()->count();
        $data['commentedCount'] = auth()->user()->comments->count();
        // $comments = auth()->user()->comments->count();
        // dd($data);

        return view('person.main.index', compact('data'));
    }
}
