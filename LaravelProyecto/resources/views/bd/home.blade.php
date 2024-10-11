@extends('../layouts.frontend')

@section('content')
    
<h1>Base de Datos Con Mysql </h1>
<ul>

    <li><a href="{{route('bd_categorias')}}">Categorias</a></li>
    <li><a href="{{route('bd_productos')}}">Productos </a></li>
    <li><a href="{{route('bd_productos_paginacion')}}">Paginacion </a></li>
    <li><a href="{{route('bd_productos_buscar')}}">Buscador  </a></li>



</ul>
  
@endsection