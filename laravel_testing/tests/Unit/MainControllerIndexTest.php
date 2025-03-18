<?php

// vamos indicar que queremos usar uma instância do MainController
use App\Http\Controllers\MainController;
test('Estou a testar o MainController|index', function () {
    // vamos criar uma instância do MainController
    $mainController = new MainController();

    //vamos chamar o método index
    $result = $mainController->index();

    // vamos verificar se o resultado é uma string
    expect($result)->toBeString();

    // vamos verificar se o resultado é igual a "Olá Mundo!"
    expect($result)->toEqual("Olá Mundo!");
});
