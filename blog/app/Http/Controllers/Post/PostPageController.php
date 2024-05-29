<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostPageController extends Controller
{
    //этот метод позволяет при обращении к контроллера автоматически будет использоваться этот метод
    public function index()
{
    $posts = Post::paginate(9);
    $randomPosts = Post::get()->random(4);
    $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(3);
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

        $caruselImages = Image::where('post_id', $post->id)->get();
        $date = Carbon::parse($post->created_at);
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->get()
            ->take(3);
        $groupUsers = GroupUser::all();
        $currentUser = Auth::check() ? Auth::user()->id : null;
        $relatedGroups = $post->groups;
        foreach($relatedGroups as $group){
            $group->departure_date = Carbon::parse(($group->departure_date));
            $group['arrival_date'] = Carbon::parse(($group->arrival_date));
        }
        return view('post.show', compact('post', 'date', 'relatedPosts', 'relatedGroups', 'caruselImages', 'groupUsers', 'currentUser'));
    }
}
