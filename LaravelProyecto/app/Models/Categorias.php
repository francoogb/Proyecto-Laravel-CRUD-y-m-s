<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Categorias extends Model
{
    use HasFactory;
    protected $guarded = []; // Este arreglo vacio es para que no me pida la configuracion de tipo timestamp cuando hagamos un insert 
    public $timestamps = false; // Para no crear campos con registro de fechas
    protected $table = 'categorias'; // para verificar que vaya a la tabla correspondiente en este caso es categorias

    
}
