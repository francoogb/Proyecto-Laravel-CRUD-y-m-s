@extends('../layouts.frontend')

@section('content')
    
<h1>Formularios </h1>
    <ul>

        <li> <a href="{{route ('formularios_simple')}}">Formulario Simple</a></li>
        <li> <a href="{{route('formularios_flash')}}">Formulario Fash</a></li>
        <li> <a href="{{route('formularios_upload')}}">Formulario Upload</a></li>


    </ul>
@endsection