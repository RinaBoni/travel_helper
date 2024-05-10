<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\StoreRequest;
use App\Http\Requests\Group\UpdateRequest;
use App\Models\Group;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index(){
        $groups = Group::paginate(9);
        return view('group.index', compact('groups'));
    }



    public function create(){

        $posts = Post::all();
        return view('group.create', compact('posts'));
    }



    public function store(StoreRequest $request){
        $data = $request->validated();
        $current_user = Auth::user()->id;
        Group::firstOrCreate([
            'title' => $data['title'],
            'departure_date' => $data['departure_date'],
            'arrival_date' => $data['arrival_date'],
            'post_id' => $data['post_id'],
            'additional_information' => $data['additional_information'],
            'creator' => $current_user,
        ]);
        return redirect()->route('group.index');
    }



    public function show(Group $group){
        $departure_date = Carbon::parse(($group->departure_date));
        $arrival_date = Carbon::parse(($group->arrival_date));
        $currentUser = Auth::user()->id;
        $relatedGroups = Group::where('post_id', $group->post_id)
            ->where('id', '!=', $group->id)
            ->get()
            ->take(3);
        return view('group.show', compact('group', 'departure_date', 'arrival_date', 'relatedGroups', 'currentUser'));
    }



    public function edit(Group $group){
        $posts = Post::all();
        return view('group.edit', compact('posts', 'group'));
    }



    public function update(UpdateRequest $request, Group $group){
        $data = $request->validated();
        $group->update($data);
        return view('group.show', compact('group'));
    }




    public function delete(Group $group){
        $group->delete();
        return redirect()->route('group.index');
    }

}
