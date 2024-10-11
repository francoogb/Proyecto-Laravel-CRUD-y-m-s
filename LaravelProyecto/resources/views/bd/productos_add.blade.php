@extends('../layouts.frontend')

@section('content')
    
<h1>Agregar Producto</h1>
<x-flash/>

<form action="{{ route('bd_productos_add_post') }}" method="POST">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del producto" value="{{ old('nombre') }}">
    </div>
    <div class="form-group">
        <label for="categorias_id">Categorias</label>
        <select name="categorias_id" id="categorias_id" class="form-control">

            @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}"> {{$categoria->nombre}} </option>
            @endforeach

        </select>
            
    </div>

    <div class="form-group">
        <label for="precio">Precio</label>
        <input type="text" class="form-control" onkeypress="return soloNumeros(event)" id="precio" name="precio" placeholder="$ Precio" value="{{ old('precio') }}">
    </div>

    <div class="form-group">
        <label for="stock">Stock</label>
        <select name="stock" id="stock" class="form-control">
            @for ($i = 1; $i <= 10; $i++)
                <option value="{{ $i }}" {{ old('stock') == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>
    </div>

    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese una descripción">{{ old('descripcion') }}</textarea>
    </div>

    <hr>

    <button type="submit" class="btn btn-primary">
        <i class="fas fa-check"></i> Crear un Producto
    </button>
</form>

@endsection
