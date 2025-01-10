<?php

namespace App\Http\Controllers;

use App\Mail\NewUserConfirmation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(): View
    {
        return view("auth.login");
    }

    public function authenticate(Request $request): RedirectResponse
    {
        // form validation
        $credentials = $request->validate(
            [
                "username" => "required|min:3|max:30",
                "password" => "required|min:8|max:32|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/"
            ],
            [
                "username.required" => "O usuário é obrigatório.",
                "username.min" => "O usuário deve ter no mínimo :min caracteres.",
                "username.max" => "O usuário deve ter no máximo :max caracteres.",
                "password.required" => "A senha é obrigatória.",
                "password.min" => "A senha deve conter no mínimo :min caracteres.",
                "password.max" => "A senha deve conter no máximo :max caracteres.",
                "password.regex" => "A senha deve conter pelo menos uma letra maiúscula, uma letra minúscula e um número"
            ]
        );

        // o login tradicional do Laravel 
        // if(Auth::attempt($credentials)){
        //     $request->session()->regenerate();
        //     return redirect()->route("home");
        // } // só usar se tem email e password

        // verificar se o user existe
        $user = User::where("username", $credentials["username"])
            ->where("active", true)
            ->where(function($query){
                $query->whereNull("blocked_until")
                    ->orWhere("blocked_until", "<=", now());
            })
                ->whereNotNull("email_verified_at")
                ->whereNull("deleted_at")
                ->first();

        // verifica se o user existe
        if(!$user){
            return back()->withInput()->with([
                "invalid_login" => "Login inválido."
            ]);
        }
        // verificar se o password é valido
        if(!password_verify($credentials["password"], $user->password)){
            return back()->withInput()->with([
                "invalid_login" => "Login inválido."
            ]);
        }

        // atualizar o último login (last_login_at)
        $user->last_login_at = now();
        $user->blocked_until = null;
        $user->save();

        // login propriamente dito!
        $request->session()->regenerate();
        Auth::login($user);

        // redirecionar
        return redirect()->intended(route("home"));
    }

    public function logout(): RedirectResponse
    {
        //logout
        Auth::logout();
        return redirect()->route("login");
    }

    public function register(): View
    {
        return view("auth.register");
    }

    public function store_user(Request $request): RedirectResponse|View
    {
        //form validation
        $request->validate(
            [
                "username" => "required|min:3|max:30|unique:users,username",
                "email" => "required|email|unique:users,email",
                "password" => "required|min:8|max:32|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/",
                "password_confirmation" => "required|same:password"
            ],
            [
                "username.required" => "O usuário é obrigatório.",
                "username.min" => "O usuário deve conter no mínimo :min caracteres.",
                "username.max" => "O usuário deve conter no máximo :max caracteres.",
                "username.unique" => "Este nome não pode ser usado.",
                "email.required" => "o email é obrigatório.",
                "email.email" => "O email deve ser um endereço de email válido.",
                "email.unique" => "Este email não pode ser usado.",                
                "password.required" => "A senha é obrigatória.",
                "password.min" => "A senha deve conter no mínimo :min caracteres.",
                "password.max" => "A senha deve conter no máximo :max caracteres.",
                "password.regex" => "A senha deve conter pelo menos uma letra maiúscula, uma letra minúscula e um número.",
                "password_confirmed.required" => "A confirmação da senha é obrigatória.",
                "password_confirmed.same" => "A confirmação da senha deve ser igual à senha."
            ]
        );

        // vamos criar um novo usuário definindo um token de verificação de email
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->token = Str::random(64);

        // gerar link
        $confirmation_link = route("new_user_confirmation", ["token" => $user->token]);

        // enviar email
        $result = Mail::to($user->email)->send(new NewUserConfirmation($user->username, $confirmation_link));

        // verficiar se o email foi enviado com sucesso
        if(!$result){
            return back()->withInput()->with([
                "server_error" => "Ocorreu um erro ao enviar o email de confirmação."
            ]);
        }

        // criar o usuário na base de dados
        $user->save();

        // apresentar view de sucesso
        return view("auth.email_sent", ["email" => $user->email]);
    }

    public function new_user_confirmation($token)
    {
        // verificar se o token é válido
        $user = User::where("token", $token)->first();
        if(!$user){
            return redirect()->route("login");
        }

        //confirmar o registro do usuário
        $user->email_verified_at = Carbon::now();
        $user->token = null;
        $user->active = true;
        $user->save();

        // autenticação automática (login) do usuário confirmado
        Auth::login($user);

        // apresenta uma mensagem de sucesso
        return view("auth.new_user_confirmation");
    }
}
