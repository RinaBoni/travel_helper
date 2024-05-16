<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Group;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostPageController extends Controller
{
    //этот метод позволяет при обращении к контроллера автоматически будет использоваться этот метод
    public function index()
{
    $posts = Post::paginate(6);
    $randomPosts = Post::get()->random(4);
    $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
    $role = 'person';
    $groups = Group::all();

    return view('post.index', compact('posts', 'randomPosts', 'likedPosts', 'role', 'groups'));
}

    public function post(Category $category)
    {
        $posts = $category->posts()->paginate(6);
        return view('category.post.index', compact('posts'));
    }

    public function show(Post $post){

        $caruselImages = Image::all();
        $date = Carbon::parse($post->created_at);
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->get()
            ->take(3);
        $relatedGroups = $post->groups;
        return view('post.show', compact('post', 'date', 'relatedPosts', 'relatedGroups', 'caruselImages'));
    }
}
