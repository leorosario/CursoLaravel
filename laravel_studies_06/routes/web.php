<?php

use App\Http\Controllers\MainController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, "index"]);
Route::get('/one_to_one', [MainController::class, "OneToOne"]);
Route::get('/one_to_many', [MainController::class, "OneToMany"]);
Route::get('/belongs_to', [MainController::class, "BelongsTo"]);
Route::get('/many_to_many', [MainController::class, "ManyToMany"]);
Route::get('/queries', [MainController::class, "RunningQueries"]);
Route::get('/same_results', [MainController::class, "SameResults"]);
Route::get('/collections', [MainController::class, "Collections"]);
Route::get('/serialization', [MainController::class, "Serialization"]);