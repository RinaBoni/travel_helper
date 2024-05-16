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

class SearchController extends Controller
{
    //этот метод позволяет при обращении к контроллера автоматически будет использоваться этот метод
    public function index(){
    return view('post.search');
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
