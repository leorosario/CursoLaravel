<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function nova_pagina(): View
    {
        return view("nova_pagina");
    }

    public function testes(Request $request)
    {
        // dados do usuário autenticado
        $id = auth()->user()->id;
        //ou
        $id = $request->user()->id;
        
        $username = auth()->user()->email;
        //ou
        $username = $request->user()->email;

        echo $username;
    }

    public function nova_pagina_publica(): View
    {
        return view("nova_pagina_publica");
    }

    public function main_logout()
    {
        //fazer o logout sem POST - limpar o usuário da sessão
        Auth::logout();

        //invalidar a sessão e regenerar o token
        session()->invalidate();
        session()->regenerateToken();

        return redirect("/");
    }
}
