<?php

use App\Http\Controllers\MainController;
use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, "home"]);
Route::get("/clients", [MainController::class, "showClients"]);
