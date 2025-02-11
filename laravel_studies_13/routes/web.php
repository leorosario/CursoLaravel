<?php

use App\Http\Controllers\MainController;
use App\Livewire\Counter;
use App\Livewire\FullPageComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, "home"]);
Route::get("/clients", [MainController::class, "showClients"]);
Route::get("/full-page", FullPageComponent::class);
