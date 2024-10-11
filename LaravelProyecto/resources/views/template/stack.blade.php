@extends('../layouts.frontend')

@section('content')
    
<h1>Ejemplo utilizando Stack</h1>
<a class="fancybox" href=""> <img src="{{asset('logo/cuenco-cantor.png')}}" alt="">  </a>
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('fancybox/jquery.fancybox.css')}}">
@endpush


@push('js')

    
<script src="{{asset('fancybox/jquery.fancybox.pack.js')}}"></script>
<script src="{{asset('fancybox/jquery.fancybox.js')}}"></script>

<script type="text/javascript">
 $(document).ready(function() {
            $(".fancybox").fancybox({
              openEffect  : 'none',
              closeEffect : 'none',
            });
            });
    
</script>
@endpush

