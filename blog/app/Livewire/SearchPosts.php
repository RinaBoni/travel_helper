<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class SearchPosts extends Component
{
    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        $posts=[];
        if($this->search){
            $posts = Post::search($this->search)->get();
        }
        return view('livewire.search-posts', compact('posts'));
    }
}
