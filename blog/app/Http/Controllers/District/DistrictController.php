<?php

namespace App\Http\Controllers\District;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Group;
use App\Models\Post;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    //этот метод позволяет при обращении к контроллера автоматически будет использоваться этот метод
    public function index()
    {
        $districts = Post::distinct()->orderBy('district')->pluck('district');
        return view('district.index', compact('districts'));

    }

    public function post($district)
    {
        $posts = Post::where('district', $district)->paginate(6);
        // $groups = collect();
        // foreach($posts as $post){
        //     $groups->push(Group::where('post_id', $post->id)->get());
        // }

        $groups = $posts->flatMap(function ($post) {
            return Group::where('post_id', $post->id)->get();
        });
        return view('district.post.index', compact('posts', 'district', 'groups'));
    }

        // $groups = Group::whereHas('post', function($query) use ($district) {
        //     $query->where('dictrist', $district);
        // })->get();
        // dd($groups, $posts);
}
