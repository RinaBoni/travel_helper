<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostPageController extends Controller
{
    //этот метод позволяет при обращении к контроллера автоматически будет использоваться этот метод
    public function index(Category $category)
    {
        $posts = Post::paginate(6);
        $randomPosts = Post::get()->random(4);
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
        $role = 'person';

        $categories = Category::all();
        // dd( $categories);

        return view('post.index', compact('posts', 'randomPosts', 'likedPosts', 'role', 'categories', ));
    }

    public function post(Category $category)
    {
        $posts = $category->posts()->paginate(6);
        $categories = $category;
        return view('category.post.index', compact('posts', 'categories'));
    }

    public function show(Post $post){

        $date = Carbon::parse($post->created_at);
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->get()
            ->take(3);
        return view('post.show', compact('post', 'date', 'relatedPosts'));
    }
}
