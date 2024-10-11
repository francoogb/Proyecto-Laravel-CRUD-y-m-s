<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home_inicio () {
        $lista = array ("Chile", "Argentina", "Brasil", "EE.UU", "Canada", "Alemania");
      //   $lista = [1=>"Chile", 2=>"Argetnina", 3=> "Brasil"];

      $paises = array (

        array ("nombre"=>"Chile", "dominio"=> "CL"),
        array("nombre"=>"Argentina","dominio"=> "AR"),
        array("nombre"=>"República Popular de China","dominio"=> "CN"),
        array("nombre"=>"Estados Unidos","dominio"=> "US"),
        array("nombre"=>"Japón","dominio"=> "JP"),
        
      );
      $numero = 12;
        return view(' home.home', ['lista'=> $lista, 'numero'=>$numero, 'paises'=> $paises] );
    }

    public function home_hola () {
        return " Hola desde home_hola ";
    }

    
    public function home_parametros ($id, $slug) {
        echo "id=".$id . "| slug=" .$slug;
    }
}

