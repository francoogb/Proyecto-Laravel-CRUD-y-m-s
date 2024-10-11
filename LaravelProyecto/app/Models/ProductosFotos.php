<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosFotos extends Model
{
    use HasFactory;

    protected $table = 'productos_fotos';
    protected $guarded = []; // Este arreglo vacío es para que no me pida la configuración de tipo timestamp cuando hagamos un insert 
    public $timestamps = false; // Para no crear campos con registro de fechas

    public function producto()
    {
        return $this->belongsTo(Productos::class);
    }
}
