<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends BasePostController
{
    //этот метод позволяет при обращении к контроллера автоматически будет использоваться этот метод
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    public function index()
    {
        $posts = Post::all();
        // $exseption = 'c';

        return view('admin.post.index', compact('posts'));
        // return view('admin.post.index', compact('exseption'));
    }

    public function show(Post $post)
    {
        // $tags = $post->tags->pluck('title');
        // dd($tags);
        $images = Image::where('post_id', $post->id)->get();
        return view('admin.post.show', compact('post', 'images'));
        // return view('admin.post.show', compact('post', 'images', 'tags'));
    }

    public function store(StoreRequest $request)
    {

        // dd($request);
        //обрабатываем запрос
        $data = $request->validated();

        //взаимодействие с базой
        $this->service->store($data);
        // return view('admin.post.index', compact('exseption'));
        return redirect()->route('admin.post.index');

    }

    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();

        $post = $this->service->update($data, $post);
        // $exseption = $this->service->update($data, $post);

        // return view('admin.post.index', compact('exseption'));

        return view('admin.post.show', compact('post'));
    }
}
