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

    public function showDetails($id)
    {
        Auth::user()->can("admin", "rh") ?: abort(403, "You are not authorized to access this page");

        // check if id is the same as the auth user
        if(Auth::user()->id === $id){
            return redirect()->route("home");
        }

        $colaborator = User::with("detail", "department")
            ->where("id", $id)
            ->first();

            return view("colaborators.show-details")->with("colaborator", $colaborator);
    }

    public function deleteColaborator($id)
    {
        Auth::user()->can("admin", "rh") ?: abort(403, "You are not authorized to access this page");
        // check if id is the same as the auth user
        if(Auth::user()->id === $id){
            return redirect()->route("home");
        }

        $colaborator = User::findOrFail($id);
        return view("colaborators.delete-colaborator-confirm", compact("colaborator"));
    }

    public function deleteColaboratorConfirm($id)
    {
        Auth::user()->can("admin", "rh") ?: abort(403, "You are not authorized to access this page");
        // check if id is the same as the auth user
        if(Auth::user()->id === $id){
            return redirect()->route("home");
        }

        $colaborator = User::findOrFail($id);
        $colaborator->delete();
        return redirect()->route("colaborators.all-colaborators");
    }
}
