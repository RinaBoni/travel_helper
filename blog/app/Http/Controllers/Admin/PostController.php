<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //этот метод позволяет при обращении к контроллера автоматически будет использоваться этот метод
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index');
    }

    public function edit(Post $post)
    {
        return view('admin.post.edit', compact('post'));
    }

    public function index()
    {
        $posts = Post::all();

        return view('admin.post.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        //заносим в бд путь к изображению (Storage::put сохраняет изображение и возвращает путь к нему)
        $data['preview_image'] = Storage::put('/images', $data['preview_image']);
        $data['main_image'] = Storage::put('/images', $data['main_image']);
        Post::firstOrCreate([
            'title' => $data['title'],
            'content' => $data['content'],
            'preview_image' => $data['preview_image'],
            'main_image' => $data['main_image'],
            'category_id' => $data['category_id'],
        ]);
        return redirect()->route('admin.post.index');
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update($data);
        return view('admin.post.show', compact('post'));
    }
}
