@extends('../layouts.frontend')

@section('content')
    
<h1>Utiles  </h1>
<ul>

    <li><a href="{{route('utiles_pdf')}}">Reporte PDF</a></li>
    <li><a href="{{route('reporte_excel')}}">Reporte Excel </a></li>
    <li><a href="{{route('reporte_cliente_rest')}}">Cliente Rest con Guzzlehttp </a></li>
    <li><a href="{{route('reporte_cliente_soap')}}">Cliente Soap  </a></li>

</ul>
  
@endsection