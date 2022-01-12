<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    use HasFactory;

    public $timestamps = false;

    // Como o laravel coloca "s" depois do nome da Model para encontrar a tabela, ele buscava "imagems".
    //Para que isso não acontecesse, foi necessário declarar o nome da tabela aqui.
    protected $table = 'imagens';
}
