<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
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
        try{
            $data = $request->validated();

            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
            //заносим в бд путь к изображению (Storage::put сохраняет изображение и возвращает путь к нему)
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

            $post = Post::firstOrCreate([
                'title' => $data['title'],
                'content' => $data['content'],
                'preview_image' => $data['preview_image'],
                'main_image' => $data['main_image'],
                'category_id' => $data['category_id'],
            ]);
        $post->tags()->attach($tagIds);
        } catch(\Exception $exseption){
            abort(404);
        }

        return redirect()->route('admin.post.index');
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $tagIds = $data['tag_ids'];
        unset($data['tag_ids']);
        //заносим в бд путь к изображению (Storage::put сохраняет изображение и возвращает путь к нему)
        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);


        $post->update($data);
        $post->tags()->sync($tagIds);

        return view('admin.post.show', compact('post'));
    }
}
