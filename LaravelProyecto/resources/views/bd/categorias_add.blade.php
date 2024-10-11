@extends('../layouts.frontend')

@section('content')
    
<h1>Agregar Categorías</h1>
<x-flash/>

<form action="{{ route('bd_categorias_add_post') }}" method="POST">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="nombre">Nombre </label>
        <input type="text" class="form-control" {{old('nombre')}} id="nombre" name="nombre" placeholder="Ingrese el nombre de la categoría" >
    </div>
    <hr>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-check"></i> Enviar
    </button>
</form>

@endsection
