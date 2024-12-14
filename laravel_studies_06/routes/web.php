<?php

use App\Http\Controllers\MainController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, "index"]);
Route::get('/one_to_one', [MainController::class, "OneToOne"]);
Route::get('/one_to_many', [MainController::class, "OneToMany"]);