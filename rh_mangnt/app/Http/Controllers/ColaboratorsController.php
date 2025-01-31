<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ColaboratorsController extends Controller
{    
    public function index()
    {
        Auth::user()->can("admin") ?: abort(403, "You are not authorized to access this page");
        $colaborators = User::with("detail", "department")
            ->where("role", "<>", "admin")
            ->get();
   
        return view("colaborators.admin-all-colaborators")->with("colaborators", $colaborators);        
    }
}
