<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(): void
    {
        echo "<p>Index</p>";
    }

    public function about(): void
    {
        echo "<p>About</p>";
    }

    public function contact(): void
    {
        echo "<p>Contact</p>";
    }
}
