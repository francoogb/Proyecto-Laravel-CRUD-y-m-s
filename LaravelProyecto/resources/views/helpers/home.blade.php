@extends('../layouts.frontend')

@section('content')
    
<h1>Helpers con Laravel</h1>

<hr>
<h3>{{ $version }}</h3>
<h3>{{ Helpers::holaMundo() }}</h3>
<h4>{{Helpers::getName("Frxngb")}}</h4>
<hr>

<h3> </h3>
@endsection
