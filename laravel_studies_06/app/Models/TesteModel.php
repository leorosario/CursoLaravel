<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TesteModel extends Model
{
    // se quiser definir qual é a tabela do model.

    protected $table = "products";

    //definir a chave primária

    protected $primayKey = "id";

    public $incrementing = false;

    protected $keyType = "string";

    public $timestamps = false;

    protected $dateFormat = "Y-m-d H:i:s";

    const CREATED_AT = "data_criacao";
    const UPDATE_aT = "data_atualizacao";

    protected $connection = "mysql_new";
}
