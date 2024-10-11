<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curso Laravel</title>
    {{-- CSS --}}
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/jquery.alerts.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('')}}">
    <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }
  
        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
  
        .b-example-divider {
          width: 100%;
          height: 3rem;
          background-color: rgba(0, 0, 0, .1);
          border: solid rgba(0, 0, 0, .15);
          border-width: 1px 0;
          box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }
  
        .b-example-vr {
          flex-shrink: 0;
          width: 1.5rem;
          height: 100vh;
        }
  
        .bi {
          vertical-align: -.125em;
          fill: currentColor;
        }
  
        .nav-scroller {
          position: relative;
          z-index: 2;
          height: 2.75rem;
          overflow-y: hidden;
        }
  
        .nav-scroller .nav {
          display: flex;
          flex-wrap: nowrap;
          padding-bottom: 1rem;
          margin-top: -1px;
          overflow-x: auto;
          text-align: center;
          white-space: nowrap;
          -webkit-overflow-scrolling: touch;
        }
  
        .btn-bd-primary {
          --bd-violet-bg: #712cf9;
          --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
  
          --bs-btn-font-weight: 600;
          --bs-btn-color: var(--bs-white);
          --bs-btn-bg: var(--bd-violet-bg);
          --bs-btn-border-color: var(--bd-violet-bg);
          --bs-btn-hover-color: var(--bs-white);
          --bs-btn-hover-bg: #6528e0;
          --bs-btn-hover-border-color: #6528e0;
          --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
          --bs-btn-active-color: var(--bs-btn-hover-color);
          --bs-btn-active-bg: #5a23c8;
          --bs-btn-active-border-color: #5a23c8;
        }
  
        .bd-mode-toggle {
          z-index: 1500;
        }
  
        .bd-mode-toggle .dropdown-menu .active .bi {
          display: block !important;
        }
        .logout-link {
    display: inline-block;
    padding: 8px 12px;
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 4px;
    color: #343a40;
    text-decoration: none;
    transition: background-color 0.3s, color 0.3s;
}

.logout-link:hover {
    background-color: #e9ecef;
    color: #212529;
}

.logout-link i {
    margin-right: 5px;
}
      </style>
      <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900&amp;display=swap" rel="stylesheet"/>
      <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

      <link href="{{asset('css/blog.css')}}" rel="stylesheet">
@stack('css')
</head>
<body>
    {{-- Contenido --}}
    <div class="container">
        <header class="border-bottom lh-1 py-3">
          <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
              <a class="link-secondary" href="#">Subscribe</a>
            </div>
            <div class="col-4 text-center">
              <a class="blog-header-logo text-body-emphasis text-decoration-none" href="{{route('template_inicio')}}">

                <img src="{{asset('logo/gran-buda-de-tailandia.png')}}" alt="" width="120px">

              </a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
              <a class="link-secondary" href="#" aria-label="Search">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"></circle><path d="M21 21l-5.2-5.2"></path></svg>
              </a>
              <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a>

            </div>
          </div>
        </header>
      
        <div class="nav-scroller py-1 mb-3 border-bottom">
          <nav class="nav nav-underline justify-content-between">
            <a class="nav-item nav-link link-body-emphasis active" href="{{route('template_inicio')}}">Home</a>
            <a class="nav-item nav-link link-body-emphasis" href="{{route ('formularios_inicio')}}">Formularios</a>
            <a class="nav-item nav-link link-body-emphasis" href="{{route ('helper_inicio')}}">Helpers</a>
            <a class="nav-item nav-link link-body-emphasis" href="{{route('mail_inicio')}}">Envios de Emails</a>
            <a class="nav-item nav-link link-body-emphasis" href="{{route('bd_inicio')}}">Base de datos</a>
            <a class="nav-item nav-link link-body-emphasis" href="{{route('utiles_inicio')}}">Utiles  </a>
            @if (Auth::check())
            <a class="nav-item nav-link link-body-emphasis" href="#">Hola {{ Auth::user()->name }} ({{ session('perfil') }})</a>
            <a class="nav-item nav-link link-body-emphasis" href="{{ route('protegida_inicio') }}">Protegida</a>
            <a class="nav-item nav-link link-body-emphasis" href="{{ route('protegida_otra') }}">Protegida2</a>
            <a href="javascript:void(0)" onclick="confirmaAlert('Realmente desea cerrar la sesión?', '{{ route('acceso_salir') }}')" class="logout-link">
              <i class="fas fa-sign-out-alt fa-lg"></i>
          </a>
          
            @else
                <a class="nav-item nav-link link-body-emphasis" href="{{ route('acceso_login') }}">Login</a>
                <a class="nav-item nav-link link-body-emphasis" href="{{ route('acceso_registro') }}">Registro</a>
            @endif
        
      
          </nav>
        </div>
      </div>


      <main class="container">
        @yield('content')

      </main>
    {{-- Contenido --}}
 <footer class="py-5 text-center text-body-secondary bg-body-tertiary">
        <p>todos los derechos reservados - desarrollado por <a href="https://getbootstrap.com/">Frxngb</a> </p>
       
</footer>

<script src="{{asset('js/jquery-2.0.0.min.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/jquery.alerts.min.js')}}"></script>
<script src="{{asset('js/funciones.js')}}"></script>
<script src="https://kit.fontawesome.com/f4af70b015.js" crossorigin="anonymous"></script>


@stack('js')

</body>
</html>