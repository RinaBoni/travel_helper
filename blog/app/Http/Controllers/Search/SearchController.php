<?php

namespace App\Http\Controllers\Search;

use App\Filters\PostFilter;
use App\Filters\GroupFilter;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Group;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //этот метод позволяет при обращении к контроллера автоматически будет использоваться этот метод
    // public function index(PostFilter $postFilter, GroupFilter $groupFilter){
    //     $tagss = Tag::all();
    //     $categories = Category::all();
    //     $posts = Post::filter($postFilter)->get();
    //     $groups = Group::filter($groupFilter)->get();
    //     return view('post.search', compact('tagss', 'posts', 'groups', 'categories'));
    // }



    // public function index(Request $request)
    // {
    //     $results = null;
    //     $tagss = Tag::all();
    //     $categories = Category::all();
    //     if($query = $request->get('query')){
    //         // $results = Post::search($query)->get();
    //         $results = Post::search($query, function($meilisearch, $query, $options) use ($request) {
    //             if($categoryId = $request->get('category_id')){
    //                 $options['filter'] = 'category_id=' . $categoryId;
    //             }
    //             if($districtId = $request->get('district')){
    //                 $options['filter'] = 'district="' . $districtId . '"';
    //             }
    //                 return $meilisearch->search($query, $options);
    //             // if($tagsId = $request->get('tag_id')){
    //             //     $options['filter'] = 'tag_id=' . $tagsId;
    //             // }
    //                 })
    //         ->get();

    //     }
    //     return view('post.search', compact('results', 'tagss', 'categories'));

    // }

    public function index(Request $request)
{
    $results = null;
    $tagss = Tag::all();
    $categories = Category::all();
    $search_field_filled = $request->get('query');
    if ($query = $request->get('query')) {
        $results = Post::search($query, function($meilisearch, $query, $options) use ($request) {
            $filters = [];

            if ($categoryId = $request->get('category_id')) {
                $filters[] = 'category_id=' . $categoryId;
            }

            if ($district = $request->get('district')) {
                $filters[] = 'district="' . $district . '"';
            }

            if ($tagId = $request->get('tag')) {
                $filters[] = 'tags:' . $tagId;
            }

            if (!empty($filters)) {
                $options['filter'] = implode(' AND ', $filters);
            }
            if ($tagId = $request->get('tag')) {
                $options = [
                    'filter' => 'tags = ' . $tagId,
                ];
            }

            return $meilisearch->search($query, $options);
        })
        ->get();
    }

    return view('post.search', compact('results', 'tagss', 'categories', 'search_field_filled'));
}


    /* public function index(Request $request)
    {
        $results = null;
        $tagss = Tag::all();
        $categories = Category::all();

        if ($query = $request->get('query')) {
            $results = Post::search($query, function($meilisearch, $query, $options) use ($request) {
                $filters = [];

                if ($categoryId = $request->get('category_id')) {
                    $filters[] = 'category_id=' . $categoryId;
                }

                if ($district = $request->get('district')) {
                    $filters[] = 'district="' . $district . '"';
                }

                if (!empty($filters)) {
                    $options['filter'] = implode(' AND ', $filters);
                }

                return $meilisearch->search($query, $options);
            })
            ->get();
        }

        return view('post.search', compact('results', 'tagss', 'categories'));
    } */

    // public function index(Request $request)
    // {
    //     $posts_queery = Post::query();
    //     $search_param = $request->query('q');
    //     if($search_param){
    //         $posts_queery = Post::search($search_param);
    //     }
    //     $posts = $posts_queery->get();
    //     return view('post.search', compact('posts', 'search_param'));

    // }
    public function post(Request $request)
    {
        $input = $request->all();
        $data = Post::select("title")
            ->where("title", "LIKE", "%{input['query']}%")
            ->get();
        return response()->json($data);
    }


}
