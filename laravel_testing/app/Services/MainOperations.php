<?php

namespace App\Services;

class MainOperations
{
    public static function generateHash($numchars = 32): string
    {
        // gerar uma hash de 32 caracteres - letras e algarismos
        // return bin2hex(random_bytes((int)$numchars/2));
        return bin2hex(random_bytes($numchars));
    }

    public static function mathOperation($a, $b, $operation): int|float|null
    {
        // executa uma das quatro operações matemáticas base

        switch ($operation) {
            case 'add':
                return $a + $b;
                break;
            
            case 'subtract':
                return $a - $b;
                break;

            case 'multiply':
                return $a * $b;
                break;

            case 'divide':
                return $a / $b;
                break;
            
            default:
                return null;
                break;
        }
    }
}