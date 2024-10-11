<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Perfil;
use App\Models\User;


class UserMetadata extends Model
{
    use HasFactory;
    protected $table = 'user_metadata';
    protected $guarded = []; // Este arreglo vacío es para que no solicite la configuración de tipo timestamp cuando hagamos un insert 
    public $timestamps = false; // Para no crear campos con registro de fechas

    public function users()
    {
        return $this->belongsTo(User::class, );
    }
    
    public function perfil(){
        return $this->belongsTo(Perfil::class, );
    }

    
}
