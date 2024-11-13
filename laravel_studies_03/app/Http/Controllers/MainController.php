<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function showPage():View
    {
        //as línguas que cada pessoa fala

        $data = [
            "Carlos" => [
                "Português",
                "Inglês"
            ],
            "Mário" => [
                "Português"
            ],
            "João" => [
                "Português",
                "Inglês",
                "Francês"
            ]
        ];

        return view("home", ["pessoas_linguas" => $data]);
    }
}
