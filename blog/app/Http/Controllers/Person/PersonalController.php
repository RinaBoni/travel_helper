<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\Person\Personal\UpdateRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonalController extends Controller
{
    //этот метод позволяет при обращении к контроллера автоматически будет использоваться этот метод
    public function index()
    {
        $user = auth()->user();
        return view('person.personal.index', compact('user'));
    }

    public function edit(User $user)
    {

        return view('person.personal.edit', compact('user'));
    }

    public function update(UpdateRequest $request, User $user){
        $authenticatedUser = auth()->user();

        $data = $request->validated();

        $comments = $authenticatedUser->comments;

        if (isset($data['user_image'])) {
            $data['user_image'] = Storage::disk('public')->put('/images', $data['user_image']);
        }

        $updateData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'user_image' => isset($data['user_image']) && $data['user_image'] !== '0' ? $data['user_image'] : null,
            'lastname' => isset($data['lastname']) && $data['lastname'] !== '0' ? $data['lastname'] : null,
            'phone_number' => isset($data['phone_number']) && $data['phone_number'] !== '0' ? $data['phone_number'] : null,
            'car' => isset($data['car']) && $data['car'] !== '0' ? $data['car'] : null,
            'newsletter' => isset($data['newsletter']) && $data['newsletter'] !== '0' ? $data['newsletter'] : null,
        ];

        try {
            $user->update($updateData);
            // abort(500);
            $data = [];
            $data['likedCount'] = auth()->user()->likedPosts()->count();
            $data['commentedCount'] = auth()->user()->comments->count();


            $name = auth()->user()->name;
        return view('person.main.index', compact('user', 'data', 'name'));
        } catch (\Exception $exception) {
            $exception->getMessage();
            // return redirect()->back();
            abort(500);
        }


    }


    // public function update(UpdateRequest $request, User $user)
    // {
    //     $user = auth()->user();
    //     $data = $request->validated();
    //     $comments = auth()->user()->comments;
    //     if (isset($data['user_image'])) {
    //         $data['user_image'] = Storage::disk('public')->put('/images', $data['user_image']);
    //     }
    //     $updateData = [
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'user_image' => isset($data['user_image']) && $data['user_image'] !== '0' ? $data['user_image'] : null,
    //         'lastname' => isset($data['lastname']) && $data['lastname'] !== '0' ? $data['lastname'] : null,
    //         'phone_number' => isset($data['phone_number']) && $data['phone_number'] !== '0' ? $data['phone_number'] : null,
    //         'car' => isset($data['car']) && $data['car'] !== '0' ? $data['car'] : null,
    //         'newsletter' => isset($data['newsletter']) && $data['newsletter'] !== '0' ? $data['newsletter'] : null,
    //     ];
    //     try {
    //         $user->update($updateData);
    //     } catch (\Exception $exseption) {
    //         $exseption->getMessage();
    //         return view('person.comment.index', compact('exseption', 'comments'));
    //     }
    //     return redirect()->route('person.personal.index');
    // }



    public function delete(User $user)
    {
        $user->delete();
        // dd($comments);
        return redirect()->route('person.personal.index');
    }
}
