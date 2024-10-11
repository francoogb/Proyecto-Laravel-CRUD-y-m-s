@extends('../layouts.frontend')

@section('content')
    
<h1>Cliente Rest</h1>

<h3>Estatus: {{ $status }}</h3>
<p>{{ $json }}</p>
<p>{{ print_r($headers, true) }}</p>

<table border="1">
    <thead>
        <tr>
            <th>Amiibo Series</th>
            <th>Character</th>
            <th>Game Series</th>
            <th>Name</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($datos['amiibo']) && is_array($datos['amiibo']))
            @foreach($datos['amiibo'] as $amiibo)
                <tr>
                    <td>{{ $amiibo['amiiboSeries'] }}</td>
                    <td>{{ $amiibo['character'] }}</td>
                    <td>{{ $amiibo['gameSeries'] }}</td>
                    <td>{{ $amiibo['name'] }}</td>
                    <td><img src="{{ $amiibo['image'] }}" alt="{{ $amiibo['name'] }}" width="50"></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">No se encontraron datos de Amiibo.</td>
            </tr>
        @endif
    </tbody>
</table>

@endsection
