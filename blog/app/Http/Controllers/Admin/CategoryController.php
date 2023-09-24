<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //этот метод позволяет при обращении к контроллера автоматически будет использоваться этот метод
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        // dd($data);
        // $lesson->tags= implode(', ', $request->input('tags'));
        Category::firstOrCreate(['title' => $data['title']]);
        return redirect()->route('admin.category.index');
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        return view('admin.category.show', compact('category'));
    }
}
