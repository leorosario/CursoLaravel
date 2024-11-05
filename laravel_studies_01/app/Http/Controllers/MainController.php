<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function initMethod(): string
    {
        return "Hello World!";
    }

    public function viewPage(): View
    {
        return view("home");
    }
}
