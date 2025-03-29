<?php

use App\Services\MainOperations;

test('Testar se é gerada uma hash com número de caracteres esperados', function(){

    expect(strlen(MainOperations::generateHash()))->toBe(32);
    expect(strlen(MainOperations::generateHash(64)))->toBe(64);
    expect(strlen(MainOperations::generateHash(16)))->toBe(16);
    expect(strlen(MainOperations::generateHash(32)))->toBe(32);
});