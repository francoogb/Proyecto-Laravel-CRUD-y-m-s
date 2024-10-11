<?php

namespace App\Http\Controllers;
use App\Rules\ValidaSelect;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class FormulariosController extends Controller
{
    //
    public function formularios_Inicio() {

        return view('formularios.home');
    }

    public function formularios_simple() {

        
      $paises = array (

        array ("nombre"=>"Chile", "Id"=> "1"),
        array("nombre"=>"Argentina","Id"=> "2"),
        array("nombre"=>"República Popular de China","Id"=> "3"),
        array("nombre"=>"Estados Unidos","Id"=> "4"),
        array("nombre"=>"Japón","Id"=> "5"),
        
      );
      $intereses = array (
        array ("nombre"=>"Deportes", "Id"=> "1"),
        array("nombre"=>"Tecnología","Id"=> "2"),
        array("nombre"=>"Viajes","Id"=> "3"),
        array("nombre"=>"Arte","Id"=> "4"),
        array("nombre"=>"Cine","Id"=> "5"),
    );
    
        return view('formularios.simple', compact('paises', 'intereses'));
    }


    public function formularios_simple_post(Request $request) {

        $request->validate([
            'nombre' => 'required|min:6',
            'correo' => 'required|email:rfc,dns',
            'descripcion' => 'required|min:10',
            'password' => 'required|min:8',
            'pais'=> [new ValidaSelect()]
        ],  
        [
            'nombre.required'=> 'El campo nombre está vacío',
            'nombre.min' => 'El campo nombre debe tener al menos :min caracteres',
            'correo.required'=> 'El campo correo está vacío',
            'correo.email' => 'El campo correo debe ser una dirección de correo electrónico válida',
            'descripcion.required'=> 'El campo descripción está vacío',
            'descripcion.min' => 'El campo descripción debe tener al menos :min caracteres',
            'password.required'=> 'El campo contraseña está vacío',
            'password.min' => 'El campo contraseña debe tener al menos :min caracteres',
        ]
    );
   

    }
        public function formularios_flash () {

            return view ('formularios.flash');

        }
        
        public function formularios_flash2(Request $request) {
            $request->session()->put('css', 'success');
            $request->session()->put('mensaje', 'mensaje enviado correctamente');
        
            return redirect()->route('formularios_flash3');
        }
        
        public function formularios_flash3 () {
            return view ('formularios.flash3');

        }

    public function formularios_upload() {
        return view ('formularios.upload');

    }

    public function formularios_upload_post(Request $request) {
        $request->validate([
            'foto' => 'required|mimes:pdf,doc,docx,txt,png,jpeg'
        ], [
            'foto.required' => 'El campo foto está vacío',
            'foto.mimes' => 'El campo foto debe ser un archivo pdf, doc, docx, txt, png o jpeg'
        ]);
    
        switch ($request->file('foto')->getClientMimeType()) {
            case 'image/png':
                $extension = 'png';
                break;
            case 'image/jpeg':
                $extension = 'jpeg';
                break;
            default:
                // Si no es un tipo de imagen válido, usamos la extensión original del archivo
                $extension = $request->file('foto')->getClientOriginalExtension();
                break;
        }
    
        // Crear un nombre de archivo único
        $archivo = time() . '.' . $extension;
    
        // Mover el archivo cargado al directorio deseado
        $request->file('foto')->move('uploads/udemy/', $archivo);
    
        $x_error = 'flash';  
        $request->session()->$x_error('css', 'success');
        $request->session()->$x_error('mensaje', 'Se subió el archivo correctamente');
        
        return redirect()->route('formularios_upload');
    }
    
}