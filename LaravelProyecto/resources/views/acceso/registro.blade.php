@extends('../layouts.frontend')

@section('content')
    
    <h1>Registro</h1>
    <x-flash/>
    
    <form method="POST" action="{{ route('acceso_registro_post') }}">
        {{ csrf_field() }}
        <!-- Campo de nombre -->
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}">
        </div>

        <!-- Campo de correo -->
        <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="text" name="correo" id="correo" class="form-control" value="{{ old('correo') }}">
        </div>

        <!-- Campo de teléfono -->
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') }}">
        </div>

        <!-- Campo de dirección -->
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion') }}">
        </div>

        <!-- Campo de contraseña -->
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <!-- Campo para repetir contraseña -->
        <div class="form-group">
            <label for="password2">Repetir Contraseña:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>

        <!-- Agrega más campos según lo necesites -->
        <hr>
        
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  
@endsection
