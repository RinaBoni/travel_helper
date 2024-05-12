<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
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

        return view('admin.post.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    public function store(StoreRequest $request)
    {

        // dd($request);
        //обрабатываем запрос
        $data = $request->validated();

        //взаимодействие с базой
        $this->service->store($data);
        return redirect()->route('admin.post.index');
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();

        $post = $this->service->update($data, $post);

        return view('admin.post.show', compact('post'));
    }

    public function image()
    {
        return view('admin.post.image');
    }
    public function imagestore(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg,bmp,gif',
        ]);
        $uploadImage = $request->file('image');
        $storeImage = Storage::disk('public')->put('/images',$uploadImage);

        Image::firstOrCreate([
            'image' => $storeImage,
            'title_image' => false]);

        return redirect()->back()->with('message', 'image uploaded successfully');
    }
}
