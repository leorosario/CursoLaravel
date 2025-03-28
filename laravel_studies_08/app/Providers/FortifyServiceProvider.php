<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        //--------------------------------------------------------------------
        // vamos definir a função que vai devolver a view de login (formulário)
        Fortify::loginView(function(){
            return view("auth.login");
        });

        //--------------------------------------------------------------------
        // vamos definir a função que vai devolver a view de registro (formulário)
        Fortify::registerView(function(){
            return view("auth.register");
        });

        //--------------------------------------------------------------------
        // vamos definir a função que vai devolver a view para forgot password(formulário)
        Fortify::requestPasswordResetLinkView(function(){
            return view("auth.forgout-password");
        });

        //--------------------------------------------------------------------
        // vamos definir a função que vai devolver a view para reset password(formulário)
        Fortify::resetPasswordView(function($request){
            return view("auth.reset-password", ["request" => $request]);
        });
    }
}
