@extends('../layouts.frontend')

@section('content')
<x-flash/>

<h4>Foto del producto: {{$producto->nombre}} </h4>
<hr>
<form action="{{route('bd_productos_fotos_post', ['id'=>$producto->id])}}" method="POST" name="form" enctype="multipart/form-data">
    <div class="row">

        <div class="form-group izquierda">
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control" required>
        </div>

    </div>
    {{ csrf_field() }}
    <br>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>
<div class="row">
    <table class="table table-bordered">
        <thead>
            <th>Foto</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach ($fotos as $foto)
                <tr>
                    <td>
                        <img src="{{asset('uploads/productos')}}/{{$foto->nombre}}" width="150" height="150">
                    </td>
                    <td>
                        <a href="javascript:void(0)" onclick="confirmaAlert('Realmente Deseas Borrar Este Registro?',
                                         '{{ route("bd_productos_fotos_delete", ["producto_id" => $producto->id, "foto_id" => $foto->id]) }}');" >
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>


    </table>
</div>
  
@endsection