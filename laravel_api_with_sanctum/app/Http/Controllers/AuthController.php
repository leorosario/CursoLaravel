<?php

namespace App\Http\Controllers;

use App\Services\ApiResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // validate request

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // login attempt
        $email = $request->input('email');
        $password = $request->input('password');
        $attempt = auth()->attempt([
            'email' => $email,
            'password' => $password
        ]);

        if(!$attempt){
            return ApiResponse::unauthorized();
        }

        // authenticate user
        $user = auth()->user();

        // assume o tempo de expiração que está configurado no Sanctum
        // $token = $user->createToken($user->name)->plainTextToken;

        $token = $user->createToken($user->name, ["clients:list", "clients:detail"], now()->addHour())->plainTextToken;

        // return the access token for the api requests
        return ApiResponse::success(
            [
                'user' => $user->name,
                'email' => $user->email,
                'token' => $token
            ]
        );
    }
    
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return ApiResponse::success('Logout with success');
    }
}
