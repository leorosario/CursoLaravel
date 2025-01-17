<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(): View
    {
        // get all posts and the of the user who create the post
        $posts = Post::with("user")->get();
        return view("dashboard", ["posts" => $posts]);
    }
}
