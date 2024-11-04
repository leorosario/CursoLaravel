<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\OnlyAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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

// ---------------------------------------
// ROUTE PARAMETERS
// ---------------------------------------

Route::get("/valor/{value}", [MainController::class, "mostrarValor"]);
Route::get("/valores/{value1}/{value2}", [MainController::class, "mostrarValores"]);
Route::get("/valores2/{value1}/{value2}", [MainController::class, "mostrarValores2"]);

Route::get("/opcional/{value?}", [MainController::class, "mostrarValorOpcional"]);
Route::get("/opcional1/{value1}/{value2?}", [MainController::class, "mostrarValorOpcional2"]);

Route::get("/user/{user_id}/post/{post_id}", [MainController::class, "mostrarPosts"]);

// ---------------------------------------
// ROUTE PARAMETERS WITH CONSTRAINTS
// ---------------------------------------

Route::get("/exp1/{value}", function($value){
    echo $value;
})->where("value", "[0-9]+");

Route::get("/exp2/{value}", function($value){
    echo $value;
})->where("value", "[A-Za-z0-9]+");

Route::get("/exp3/{value1}/{value2}", function($value1, $value2){
    echo "$value1 : $value2";
})->where([
    "value1" => "[0-9]+",
    "value2" => "[A-Za-z0-9]+"
]);

// ---------------------------------------
// ROUTE NAMES
// ---------------------------------------

Route::get("/rota_abc", function(){
    return "Rota nomeada";
})->name("rota_nomeada");

Route::get("/rota_referenciada", function(){
    return redirect()->route("rota_nomeada");
});

Route::prefix("admin")->group(function(){
    Route::get("/home", [MainController::class, "index"]);
    Route::get("/about", [MainController::class, "about"]);
    Route::get("/management", [MainController::class, "mostrarValor"]);
});

Route::get("admin/only", function(){
    echo "Apenas administradores!";
})->middleware([OnlyAdmin::class]);

Route::middleware(OnlyAdmin::class)->group(function(){
    Route::get("/admin/only2", function(){
        return "Apenas administradores 1";
    });
    Route::get("/admin/only3", function(){
        return "Apenas administradores 2";
    });
});

//Route::get("/new", [UserController::class, "new"]);
//Route::get("/edit", [UserController::class, "edit"]);
//Route::get("/delete", [UserController::class, "delete"]);

Route::controller(UserController::class)->group(function(){
    Route::get("/user/new", "new");
    Route::get("/user/edit", "edit");
    Route::get("/user/delete", "delete");
});

Route::fallback(function(){
    echo "PÁGINA NÃO ENCONTRADA";
});