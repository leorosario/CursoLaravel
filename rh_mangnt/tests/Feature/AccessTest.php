<?php

it('tests is an admin user can see the RH users page', function(){
    // criar o admin
    addAdminUser();

    // login automático
    auth()->loginUsingId(1);

    // verifica se acede com sucesso à pagina de RH users
    expect($this->get('/rh-users')->status())->toBe(200);
});

it('tests if is not possible to acces the home page without logged user', function(){
    // verifica se é possível aceder à home page
    expect($this->get('/home')->status())->toBe(302);

    // ou
    expect($this->get('/home')->status())->not()->toBe(200);
});

it('tests if user logged in can acces to the login page', function(){
    // adiconar admin à base de dados
    addAdminUser();

    // login automático
    auth()->loginUsingId(1);

    // verifica se é possível aceder à login page
    expect($this->get('/login')->status())->not()->toBe(200);   
});

it('tests if user logged in can acces to the recover password page', function(){
    // adiconar admin à base de dados
    addAdminUser();

    // login automático
    auth()->loginUsingId(1);

    // verifica se é possível aceder à forgot passowrd page
    expect($this->get('/forgot-password')->status())->not()->toBe(200);   
});
