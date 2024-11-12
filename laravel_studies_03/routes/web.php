<?php

use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    echo "Blade Layouts";
});

Route::view("/home", "home");