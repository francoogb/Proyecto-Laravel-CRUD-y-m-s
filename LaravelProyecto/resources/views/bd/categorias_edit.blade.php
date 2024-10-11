@extends('../layouts.frontend')

@section('content')
    
<h1>Editar Categorías</h1>
<x-flash/>

<form action="{{ route('bd_categorias_editar_post', ['id' => $categoria->id]) }}" method="POST">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="nombre">Nombre </label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $categoria->nombre) }}" placeholder="Ingrese el nombre de la categoría" required>
    </div>
    <hr>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-check"></i> Enviar
    </button>
</form>

@endsection
