<?php

namespace App\Http\Controllers\District;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        return view('district.post.index', compact('posts', 'district'));
    }
}
