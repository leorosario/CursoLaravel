<?php

describe('Testes com datasets', function(){

    // coleção de dados
    $clients = [
        ['Joao', 18],
        ['Carlos', 25],
        ['Ana', 35],
    ];

    // testes
    it('verifies if all clients have name', function($name){
        expect($name)->toBeString();
    })->with($clients);

    it('verifies if all clients are adults', function($name, $age){
        expect($age)->toBeGreaterThanOrEqual(18)->toBeInt();
    })->with($clients);

});
