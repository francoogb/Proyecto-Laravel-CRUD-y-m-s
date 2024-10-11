<?php

namespace App\Http\Controllers;
use App\Models\UserMetadata;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class AccesoController extends Controller
{

    public function acceso_login() {

        return view('acceso.login');

    }
    public function acceso_login_post(Request $request) {
        $request->validate([
            'correo' => 'required|email:rfc,dns',
            'password' => 'required|string',
        ],
        [
            'correo'=> 'El correo debe ser una dirección de correo electrónico válida',
            'password.required' => 'El correo es requerido',
            'password.email' => 'El correo debe ser una dirección de correo electrónico válida',
            'password.required' => 'La contraseña es requerida',
        ]);
    // Procesamiento posterior si la validación es exitosa
        // Por ejemplo, autenticar al usuario
        if (Auth::attempt(['email' => $request->input('correo'), 'password' => $request->input('password')])) {
            // Autenticación exitosa

            $usuario = UserMetadata::where('user_id', Auth::id())->first();
            session(['user_metadata'=>$usuario->id]);
            session(['perfil_id'=>$usuario->perfil_id]);
            session(['perfil'=>$usuario->perfil->nombre]);


            return redirect()->intended('/template'); // Redirigir a la página de inicio

        } else {
            // Autenticación fallida
            $request->session()->put('css', 'danger');
            $request->session()->put('mensaje', 'Credenciales Incorrectas');
            return redirect()->route('acceso_login');        }

    }

    public function acceso_registro() {


        return view('acceso.registro');

    }

    public function acceso_registro_post(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email:rfc,dns|unique:users,email|max:255',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ],
        [
            'nombre.required' => 'El nombre es requerido',
            'nombre.string' => 'El nombre debe ser un texto',
            'nombre.max' => 'El nombre debe tener menos de 255 caracteres',
            'correo.required' => 'El correo es requerido',
            'correo.email' => 'El correo debe ser una dirección de correo electrónico válida',
            'correo.unique' => 'Este correo ya ha sido registrado',
            'correo.max' => 'El correo debe tener menos de 255 caracteres',
            'telefono.required' => 'El teléfono es requerido',
            'telefono.string' => 'El teléfono debe ser una cadena de texto',
            'telefono.max' => 'El teléfono debe tener menos de 20 caracteres',
            'direccion.required' => 'La dirección es requerida',
            'direccion.string' => 'La dirección debe ser una cadena de texto',
            'direccion.max' => 'La dirección debe tener menos de 255 caracteres',
            'password.required' => 'La contraseña es requerida',
            'password.string' => 'La contraseña debe ser una cadena de texto',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',
        ]);
        $user = User::create(
            [
                'name' => $request->input('nombre'),
                'email' => $request->input('correo'),
                'password' => Hash::make($request->input('password')),
                'created_at' => Carbon::now(),
                
            ]
        );
        UserMetadata::create (
            [
                'user_id' => $user->id,
                'telefono' => $request->input('telefono'),
                'direccion' => $request->input('direccion'),
                'perfil_id'=>2
            ]
            );
            $request->session()->put('css', 'success');
            $request->session()->put('mensaje', 'Se ha creado el registro exitosamente');
            return redirect()->route('acceso_registro');

    }
    public function acceso_salir (Request $request) {
        
        Auth::logout();
        $request->session()->forget('user_metadata');
        $request->session()->forget('perfil_id');
        $request->session()->forget('perfil');
        $request->session()->put('css', 'success');
        $request->session()->put('mensaje', 'Se cerro la sesion exitasamente');
        return redirect()->route('acceso_login');

  
    }
}
