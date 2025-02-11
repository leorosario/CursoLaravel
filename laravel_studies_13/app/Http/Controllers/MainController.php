<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function home(): View
    {
        $data = [
            "value4" => "Valor de variável definida no controller"
        ];
        return view("home")->with($data);
    }

    public function showClients(): View
    {
        $clients = [
            ["id" => 1, "name" => "Client 1", "phone" => "123456781"],
            ["id" => 2, "name" => "Client 2", "phone" => "123456782"],
            ["id" => 3, "name" => "Client 3", "phone" => "123456783"],
            ["id" => 4, "name" => "Client 4", "phone" => "123456784"],
            ["id" => 5, "name" => "Client 5", "phone" => "123456785"],
        ];

        return view("clients", compact("clients"));
    }
}
