@extends('../layouts.frontend')

@section('content')
    
<h1>Enviar Email </h1>
<x-flash />

<a href="{{route ('mail_enviar')}}">Enviar Mail</a>


@endsection

