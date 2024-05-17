<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Image\StoreRequest;
use App\Http\Requests\Admin\Image\UpdateRequest;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function image(Post $post)
    {
        return view('admin.post.image_add', compact('post'));
    }

    public function show(Post $post)
    {
        // dd($post->id);
        $images = Image::where('post_id', $post->id)->get();
        return view('admin.post.images_show', compact('post', 'images'));
    }
    public function imagestore(StoreRequest $request, Post $post)
    {

        $data = $request->validated();
        // dd($post->id);
        // $request->validate([
        //     'image' => 'required|mimes:png,jpg,bmp,gif',
        //     // 'post_id' => 'required|integer|exists:post,id',
        // ]);
        $uploadImage = $data['image'];
        $storeImage = Storage::disk('public')->put('/images',$uploadImage);

        Image::firstOrCreate([
            'image' => $storeImage,
            'post_id' => $post->id,
            'title_image' => false]);

        return redirect()->back()->with('message', 'image uploaded successfully');
    }

    public function delete(Image $image)
    {
        dd($image->id);
        $image->delete();
        return redirect()->route('admin.post.show', compact('post'));
    }

    public function maketitle(UpdateRequest $request, Image $image, Post $post)
    {
        $data = $request->validated();
        dd($data['title_image']);
        Image::where('id', $image->id)->update(['title_image' => 'New Name']);
        dd($image->id);
        $image->delete();
        return redirect()->route('admin.post.show', compact('post'));
    }
}
