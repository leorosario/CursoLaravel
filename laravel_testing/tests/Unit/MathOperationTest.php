<?php

use App\Services\MainOperations;

describe('MainOperations - testar o método mathOpeartion', function(){
    it('tests the addition', function(){
        $a = 10;
        $b = 5;
        $opeartion = "add";

        $result = MainOperations::mathOperation($a, $b, $opeartion);
        expect($result)->toBe(15);
    });

    it('tests the subtraction', function(){
        $a = 10;
        $b = 5;
        $opeartion = "subtract";

        $result = MainOperations::mathOperation($a, $b, $opeartion);
        expect($result)->toBe(5);
    });

    it('tests the multiplication', function(){
        $a = 10;
        $b = 5;
        $opeartion = "multiply";

        $result = MainOperations::mathOperation($a, $b, $opeartion);
        //expect($result)->toBe(50);
        expect($result)->toBe(100);
    });

    it('tests the division', function(){
        $a = 10;
        $b = 5;
        $opeartion = "divide";

        $result = MainOperations::mathOperation($a, $b, $opeartion);
        expect($result)->toBe(2);
    });
});