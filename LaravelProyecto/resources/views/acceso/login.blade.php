@extends('../layouts.frontend')

@section('content')
    
    <h1>Login de Usuario</h1>
    <x-flash/>
    
    <form method="POST" action="{{ route('acceso_login_post') }}">
        {{ csrf_field() }}
     
        <!-- Campo de correo -->
        <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="text" name="correo" id="correo" class="form-control" value="{{ old('correo') }}">
        </div>

        <!-- Campo de contraseña -->
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <hr>
        
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  
@endsection
