<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    //atributes that are hidden for seralization
     protected $hidden = [
        "password",
        "token"
     ];
}
