@extends('../layouts.frontend')



@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-dy6HEeuImr7Y1jW6dplOXliIoF0DhkoG6d5IACrYGAcfr+ibm2lsnDIFt5fEvMWWGt6VYMRKkBZP+AtJ5JURZg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<h1>Listado de Productos </h1>
<h3>Categorías: {{ $categoria->nombre }}</h3>

<x-flash/>

<p class="d-flex justify-content-end">
    <a href="{{route('bd_productos_add')}}" class="btn btn-success">
        <i class="fas fa-check"></i> Crear
    </a>
</p>
 
<div class="container mt-5">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Descripcion</th>
                    <th>Fecha</th>
                    <th>Fotos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $dato)
                <tr>
                    <td>{{ $dato->id }}</td>
                    <td>
                        <a href="{{route('bd_productos_categorias', ['id'=>$dato->categorias_id])}}">                       
                            {{ $dato->categoria->nombre ?? 'N/A' }}
                        </a>
                    </td>
                    <td>{{ $dato->nombre }}</td>
                    <td>${{ number_format($dato->precio, 0, '', '.') }}</td>
                    <td>{{ $dato->stock }}</td>
                    <td>{{ substr($dato->descripcion, 0, 20) }}.....</td>
                    <td>{{ Helpers::invierteFecha($dato->fecha) }}</td>
                    <td>
                    </td>
                    <td>
                        <a href="{{ route('bd_productos_editar', ['id' => $dato->id]) }}" class="btn btn-warning btn-sm mr-2">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a href="javascript:void(0)" onclick="confirmaAlert('Realmente desea eliminar este registro ?', '{{ route('bd_productos_eliminar', ['id' => $dato->id]) }}')" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i> Eliminar
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            
            
        </table>
    </div>
</div>
  
@endsection