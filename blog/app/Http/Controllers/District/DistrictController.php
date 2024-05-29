<?php

namespace App\Http\Controllers\District;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


        $groups = $posts->flatMap(function ($post) {
            return Group::where('post_id', $post->id)->get();
        });
        $groupUsers = GroupUser::all();
        $currentUser = Auth::check() ? Auth::user()->id : null;
        foreach($groups as $group){
            $group->departure_date = Carbon::parse(($group->departure_date));
            $group['arrival_date'] = Carbon::parse(($group->arrival_date));
        }
        return view('district.post.index', compact('posts', 'district', 'groups', 'groupUsers', 'currentUser'));
    }


}
