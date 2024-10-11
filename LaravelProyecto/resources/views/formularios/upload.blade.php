@extends('../layouts.frontend')

@section('content')
    
<h1>Formulario Upload </h1>
  
<x-flash/>

<form action="{{ route('formularios_upload_post') }}" method="post" name="form" enctype="multipart/form-data">
    {{ csrf_field() }}

    <label for="foto"> Archivo</label>
   <input type="file" name="foto" id="foto" class="form-control">

    <hr>

    <input type="submit" value="Enviar" class="btn btn-success">
</form>


@endsection