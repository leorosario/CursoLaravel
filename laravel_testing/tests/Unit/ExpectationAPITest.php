<?php

describe('Test Expectation function (API)', function(){
    it('tests the toBe() function', function(){
        $value = 10;

        // valida se o valor é 10
        expect($value)->toBe(10);

        // valida se o valor é inteiro e é igual a 10
        expect($value)
            ->toBeInt()
            ->toBe(10);
    });

    it('tests the toBeTrue() and toBeFalse() functions', function(){
        $value1 = true;
        $value2 = false;

        // valida se o valor é true
        expect($value1)->toBeTrue();

        // valida se o valor é false
        expect($value2)->toBeFalse();
    });

    it('tests the toBeNull() function', function(){
        $value = null;
        
        // valida se o valor é null
        expect($value)->toBeNull();
    });

    it('tests the toBeEmpty() function', function(){
        $value = '';
        
        // valida se o valor é vazio
        expect($value)->toBeEmpty();
    });

    it('tests the toBeArray() function', function(){
        $value = [];
        
        // valida se o valor é array
        expect($value)->toBeArray();
    });

    it('tests the toBeIn() function', function(){
        $value = 10;
        $values = [10, 20, 30];
        
        // valida se o valor existe dentro do array
        expect($value)->toBeIn($values);
    });

    it('tests the toBeJson() function', function(){
        $value = '{"name": "Joao"}';       
        
        // valida se o valor é um JSON válido
        expect($value)->toBeJson();
    });

    it('tests the toMatch() function', function(){
        $value = 'Hello World';       
        
        // valida se o valor bate certo com a expressão regular
        expect($value)->toMatch('/Hello/');
    });

    it('tests the toUppercase() function', function(){
        $value = 'WORLD';       
        
        // valida se o valor está todo em maiúsculas
        expect($value)->toBeUppercase();
    });
});
