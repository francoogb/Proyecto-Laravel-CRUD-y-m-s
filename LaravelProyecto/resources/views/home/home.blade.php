<h1> Hola desde mi vista</h1>
<hr>


@php 

    $ejemplo = "Hola mundo"

@endphp

{{$ejemplo}}
<hr>

<h3>Condicional 1 </h3>
@if ( $numero == 12) 
    El valor de la variable es {{$numero}}

@else  

    Ingresamos en el Else

@endif
<hr>

<h3>Condicional 2 </h3>
@switch($numero)
    @case(13)
        El valor del numero es 13             
        @break
    @case(12)
    El valor del numero es 12           

        @break
 
    @default
    El valor del numero es otro           

        
@endswitch

<hr>

<h3>Condiciona3</h3>

<h4> {{($numero==12)? 'Es 12 utilizando operador ternario': 'No es 12' }}</h4>

<hr>

<h3>Ciclo For</h3>

<h4> Ciclo Foreach</h4>
@foreach ($lista as $lista)

    <p> El nombre del pais es el siguiente : <strong>   {{$lista}} </strong></p>

@endforeach

@foreach  ( $paises as $pais)


    <li>{{$loop->first}} {{$loop->last}}  {{$loop->index}} {{$pais['nombre']. ' | ' . $pais['dominio']  }}</li>

@endforeach

<hr>

<h3>Ciclo For Normal </h3>

@for ( $i=1; $i<11; $i++)

    <li>{{$i}}  </li>

@endfor



@include('home.uncluido')


<hr>
<br><br>

<x-componente :mensaje="$ejemplo" />

<hr>

<h3>Enlaces </h3>

<ul>
    <li><a href="{{route ('home_inicio')}}">Inicio</a></li>
    <li><a href="{{route('home_hola')}}">Hola Enlace</a></li>
    <li><a href="{{ route('home_parametros', ['id' => 1, 'slug' => 'mi-slug']) }}">Ruta con parámetros</a></li>
    <li><a href=""></a></li>
</ul>

<h3>Archivos Estaticos</h3>

<img src="{{asset('assets/poesia.jpg')}}" alt="" width="120px">

<br>
<br>
<br>   