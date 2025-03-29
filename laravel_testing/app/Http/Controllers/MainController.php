<?php

namespace App\Http\Controllers;

use App\Services\MainOperations;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(): string
    {
        return "Olá Mundo!";
    }

    public function showHash($numchars = 32): void
    {
        echo "<p>Tamanho padrão: " . MainOperations::generateHash() . "</p>";
        echo "<p>16 caracteres: " . MainOperations::generateHash(16) . "</p>";
        echo "<p>32 caracteres: " . MainOperations::generateHash(32) . "</p>";
        echo "<p>42 caracteres: " . MainOperations::generateHash(42) . "</p>";
        echo "<p>parâmetro da rota: " . MainOperations::generateHash($numchars) . "</p>";
    }
}
