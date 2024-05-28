<?php

namespace App\Http\Controllers\Search;

use App\Filters\PostFilter;
use App\Filters\GroupFilter;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Group;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //этот метод позволяет при обращении к контроллера автоматически будет использоваться этот метод
    public function index(PostFilter $postFilter, GroupFilter $groupFilter){
        $tagss = Tag::all();
        $categories = Category::all();
        $posts = Post::filter($postFilter)->get();
        $groups = Group::filter($groupFilter)->get();
        return view('post.search', compact('tagss', 'posts', 'groups', 'categories'));
    }

    public function post(Request $request)
    {
        $input = $request->all();
        $data = Post::select("title")
            ->where("title", "LIKE", "%{input['query']}%")
            ->get();
        return response()->json($data);
    }


}
