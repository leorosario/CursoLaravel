<?php

use Illuminate\Database\Eloquent\Factories\Sequence;

describe('Test Expectation modifiers and chaning', function(){

    it('tests the and() modifier', function(){
        $name = "João";
        $surname = "Ribeiro";

        expect($name)->toBe("João")->and($surname)->toBe("Ribeiro");
    });

    it('tests if value is one or another', function(){
        $value = 10;

        // valida se $value = 10 ou 20
        expect($value)->toBeIn([10,20]);
    });

    it('tests the not() modifier', function(){
        $value = 20;

        // valida se $value não é 10
        expect($value)->not()->toBe(10);
    });

    it('tests the sequence() modifier', function(){

        $values = [1,3,5];

        // valida se a sequência é de facto o conjunto de 1, 3 e 5
        expect($values)->sequence(
            fn($value) => $value->toBeInt()->toBe(1),
            fn($value) => $value->toBeInt()->toBe(3),
            fn($value) => $value->toBeInt()->toBe(5),
        );
    });

});
