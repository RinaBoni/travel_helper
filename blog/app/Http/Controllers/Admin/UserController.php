<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //этот метод позволяет при обращении к контроллера автоматически будет использоваться этот метод
    public function index()
    {
        $categories = User::all();

        return view('admin.user.index', compact('categories'));
    }

    public function create()
    {
        $roles = User::getRoles();
        return view('admin.user.create', compact('roles'));
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index');
    }

    public function edit(User $user)
    {
        $roles = User::getRoles();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        // dd($data);
        // $lesson->tags= implode(', ', $request->input('tags'));
        User::firstOrCreate(['email' => $data['email']], $data);
        return redirect()->route('admin.user.index');
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        // dd($data);
        $user->update($data);
        return view('admin.user.show', compact('user'));
    }

}
