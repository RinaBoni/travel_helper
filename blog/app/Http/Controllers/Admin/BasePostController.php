<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\PostService;

class BasePostController extends Controller
{
    public $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }


}


