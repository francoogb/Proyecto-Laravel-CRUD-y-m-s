@extends('../layouts.frontend')



@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-dy6HEeuImr7Y1jW6dplOXliIoF0DhkoG6d5IACrYGAcfr+ibm2lsnDIFt5fEvMWWGt6VYMRKkBZP+AtJ5JURZg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<h1>Buscar Productos </h1>
<x-flash/>
@if (!empty($b))
    <h5> Resultado para el término <strong>{{$b}} </strong> </h5>
@endif

<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form name="form_buscador" action="{{ route('bd_productos_buscar') }}" method="GET" class="form-inline">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar" aria-describedby="boton-buscar"
            name="b" id="b" >
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="buscador();">Buscar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
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
                    <td>{{ $dato->nombre }}</td>

                    <td>
                        <a href="{{route('bd_productos_categorias', ['id'=>$dato->categorias_id])}}">                       
                            {{ $dato->categoria->nombre ?? 'N/A' }}
                        </a>
                    </td>

                    <td>${{number_format( $dato->precio, 0, '', '.' ) }}</td>
                    <td>{{ $dato->stock }}</td>
                    <td>{{ substr( $dato->descripcion, 0, 20 )}}.....</td>
                    <td>{{ Helpers::invierteFecha($dato->fecha) }}</td>
                    <td>
                        <a href="{{ route('bd_productos_fotos', ['id' => $dato->id]) }}">
                            <i class="fas fa-camera"></i>
                        </a>
                    
                    </td>
                    <td>
                        <a href="{{route ('bd_productos_editar', ['id' => $dato->id])}}" class="btn btn-warning btn-sm mr-2">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a href="javascript::void(0)" onclick="confirmaAlert('Realmente desea eliminar este registro ?', '{{route('bd_productos_eliminar', ['id'=> $dato->id])}}')" class="btn btn-danger btn-sm">
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