<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //этот метод позволяет при обращении к контроллера автоматически будет использоваться этот метод
    public function create()
    {
        return view('admin.tag.create');
    }

    public function delete(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tag.index');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
    }

    public function index()
    {
        $tags = Tag::all();

        return view('admin.tag.index', compact('tags'));
    }

    public function show(Tag $tag)
    {
        return view('admin.tag.show', compact('tag'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Tag::firstOrCreate(['title' => $data['title']]);
        return redirect()->route('admin.tag.index');
    }

    public function update(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->update($data);
        return view('admin.tag.show', compact('tag'));
    }
}
