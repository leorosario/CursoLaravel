<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MainController extends Controller
{
    public function index(): View
    {
        // get all posts and the of the user who create the post
        $posts = Post::with("user")->get();
        return view("dashboard", ["posts" => $posts]);
    }

    public function createPost()
    {
        // gate
        if(Gate::denies("post.create")){
            abort(403, "Você não tem permissão para criar posts.");
        }
        echo "Create Post";
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        // gate
        if(Gate::denies("post.delete", $post)){
            abort(403, "Você não tem permissão para elminar posts.");
        }
        
        echo "Delete Post";
    }
}
