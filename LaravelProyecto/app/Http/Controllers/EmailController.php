<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EjemploMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class EmailController extends Controller
{
    //


    public function mail_inicio() {

        return view ('mail.home');
    }

    public function mail_enviar(Request $request) {
        // Contenido del correo electrónico de prueba
        $html = "<h4>Este es el cuerpo del correo de prueba:</h4>
                 <p>Asunto: Prueba de Correo Electrónico</p>
                 <p>Hola Juan Perez,</p>
                 <p>Este es un correo electrónico de prueba para verificar que el sistema de correo electrónico está funcionando correctamente. Espero que este mensaje te encuentre bien.</p>
                 <p>¡Saludos cordiales!</p>
                 <p> Juan Perez</p>";
    
        // Crear el objeto EjemploMailable con el HTML del correo
        $correo = new EjemploMailable($html);
    
        // Enviar el correo electrónico
        Mail::to('kuleer123@gmail.com')->send($correo);
    
        // Establecer mensaje de éxito en la sesión
        
        $request->session()->put('css', 'success');
        $request->session()->put('mensaje', 'mensaje enviado correctamente al correo electronico ');
    
        return redirect()->route('mail_inicio');
    }
    
}
