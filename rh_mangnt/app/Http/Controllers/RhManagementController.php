<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RhManagementController extends Controller
{
    public function home()
    {  
        Auth::user()->can("rh") ?: abort(403, "you are not authorized to acess this page"); 

        // get all colaborators that are not role admin nor role rh
        $colaborators = User::with('detail', "department")
            ->where("role", "colaborator")
            ->withTrashed()
            ->get(); 

        return view("colaborators.colaborators", compact("colaborators"));
    }

    public function newColaborator(){
        Auth::user()->can("rh") ?: abort(403, "you are not authorized to acess this page");

        $departments = Department::where("id", ">", 2)->get();

        //if there are no departments, abort the request
        if($departments->count() === 0){
            abort(403, "There are no departments to add a new colaborator. Please contact the system administrator to add a new department.");
        }

        return view("colaborators.add-colaborator", compact("departments"));
    }
}
