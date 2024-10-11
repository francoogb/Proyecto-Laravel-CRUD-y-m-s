@extends('../layouts.frontend')

@section('content')
    
<h1>Editar Categorías</h1>
<x-flash/>

<form action="{{ route('bd_productos_editar_post', ['id' => $producto->id]) }}" method="POST">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del producto" value="{{ $producto->nombre }}">
    </div>
    <div class="form-group">
        <label for="categorias_id">Categorias</label>
        <select name="categorias_id" id="categorias_id" class="form-control">

            @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}" {{ $producto->categorias_id == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nombre }}
            </option>
            
            @endforeach

        </select>
            
    </div>

    <div class="form-group">
        <label for="precio">Precio</label>
        <input type="text" class="form-control" onkeypress="return soloNumeros(event)" id="precio" name="precio" placeholder="$ Precio" value="{{ $producto->precio }}">
    </div>

    <div class="form-group">
        <label for="stock">Stock</label>
        <select name="stock" id="stock" class="form-control">
            @for ($i = 1; $i <= 10; $i++)
                <option value="{{ $i }}" {{ $producto->stock == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>
        
    </div>

    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese una descripción">{{ $producto->descripcion }}</textarea>
    </div>

    <hr>

    <button type="submit" class="btn btn-primary">
        <i class="fas fa-check"></i> Editar Producto
    </button>
</form>

@endsection
