<?php

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//rota com função anônima
Route::get("/rota", function(){
    return "<h1>Olá Laravel!</h1>";
});

Route::get("/user", function(){
    return "<h1>Aqui está o usuário</h1>";
});

Route::match(["get", "post"], "/mach", function(Request $request){
    return "<h1>Aceita GET e POST</h1>";
});

Route::any("/any", function(Request $request){
    return "<h1>Aceita qulquer http verb</h1>";
});

Route::get("/index", [MainController::class, "index"]);
Route::get("/about", [MainController::class, "about"]);

Route::redirect("/saltar", "index");
Route::permanentRedirect("/saltar2", "index");

Route::view("/view", "home");

Route::view("/view2", "home", ["myName" => "João Ribeiro"]);
