<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorias;

class Productos extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $guarded = []; // Este arreglo vacío es para que no solicite la configuración de tipo timestamp cuando hagamos un insert 
    public $timestamps = false; // Para no crear campos con registro de fechas

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'categorias_id');
    }
}
