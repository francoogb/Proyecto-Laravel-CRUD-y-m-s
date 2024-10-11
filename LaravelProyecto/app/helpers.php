<?php

namespace App\Helpers;

class Helpers 
{
    public static function getVersion() 
    {
        return "1.0.0";
    }


    public static function HolaMundo() {
        return "Hola Mundo";
    }

    public static function getName($nombre) {
        return "Hola $nombre";
    }
    public static function invierteFecha($fecha)
    {
        return is_null($fecha) ? null : date('d/m/Y', strtotime($fecha));
    }
  public static  function invierteFechaHora($fecha)
    {
        return is_null($fecha) ? null : date('d-m-Y H:i:s', strtotime($fecha));
    }

   public static function numberFormat($numero)
    {
        return is_null($numero) ? 0 : number_format($numero, 0, '.', ',');
    }

}




