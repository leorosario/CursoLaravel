<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index(): View
    {
        // get all posts and their authors from database
        $posts = Post::with("user")->get();
        
        return view("home", compact("posts"));
    }

    public function update($id){
        $post = Post::find($id);

        // verify if the user is allowed to update the post
        if(Auth::user()->can("update", $post)){
            echo "O usuário pode atualizar o post!";
        }else{
            echo "O usuário NÃO pode atualizar o post!";
        }
    }

    public function delete($id){
        $post = Post::find($id);

        // verify if the user is allowed to update the post
        if(Auth::user()->can("delete", $post)){
            echo "O usuário pode eliminar o post!";
        }else{
            echo "O usuário NÃO pode eliminar o post!";
        }
    }

    public function create(){ 
        // verify if the user is allowed to update the post
        //Parametro Post::class é para PostPolicy.php entender que é um Post e deve tratar também
        if(Auth::user()->can("create", Post::class)){
            echo "O usuário pode criar o post!";
        }else{
            echo "O usuário NÃO pode criar o post!";
        }
    }
}
