<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    protected $table = 'perfil';
    protected $guarded = []; // Este arreglo vacío es para que no solicite la configuración de tipo timestamp cuando hagamos un insert 
    public $timestamps = false; // Para no crear campos con registro de fechas

    
}
