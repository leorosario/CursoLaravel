<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home()
    {
        Auth::user()->can("admin") ?: abort(403, "you are not authorized to acess this page");

        // display admin home page
        return view("home");
    }
}
