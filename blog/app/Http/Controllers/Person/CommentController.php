<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //этот метод позволяет при обращении к контроллера автоматически будет использоваться этот метод
    public function __invoke()
    {
        return view('person.comment.index');
    }
}
