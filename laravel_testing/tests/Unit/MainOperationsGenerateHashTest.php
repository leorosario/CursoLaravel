<?php

use App\Services\MainOperations;

test('Testar se é gerado uma hash com 32 caracteres', function(){
    $hash = MainOperations::generateHash();

    expect(strlen($hash))->toBe(32);
});