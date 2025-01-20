<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view("create-post");
    }

    public function storePost(Request $request)
    {
        // gate
        if(Gate::denies("post.create")){
            abort(403, "Você não tem permissão para criar posts.");
        }

        // validate the request
        $request->validate(
            [
                'title' => 'required|min:3|max:100',
                'content' => 'required|min:3|max:1000'
            ],
            [
                'title.required' => 'O campo título é obrigatório.',
                'title.min' => 'O campo título deve ter no mínimo :min caracteres.',
                'title.max' => 'O campo título deve ter no máximo :max caracteres.',
                'content.required' => 'O campo conteúdo é obrigatório.',
                'content.min' => 'O campo conteúdo deve ter no mínimo :min caracteres.',
                'content.max' => 'O campo conteúdo deve ter no máximo :max caracteres.'
            ]
        );

        //CREATE THE POST
        Post::create([
            "title" => $request->title,
            "content" => $request->content,
            "user_id" => Auth::user()->id
        ]);

        return redirect()->route("dashboard");
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        // gate
        if(Gate::denies("post.delete", $post)){
            abort(403, "Você não tem permissão para elminar posts.");
        }
        
        // delete the post
        $post->delete();

        return redirect()->route("dashboard");
    }    
}
