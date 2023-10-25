<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Post;

class LikedController extends Controller
{
    //этот метод позволяет при обращении к контроллера автоматически будет использоваться этот метод
    public function index()
    {
        $posts = auth()->user()->likedPosts;
        // dd($posts);
        return view('person.liked.index', compact('posts'));
    }

    public function delete(Post $post){
        auth()->user()->likedPosts()->detach($post->id);
        return redirect()->route('person.liked.index');
    }
}
