<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/0b0c14bd52.js') }}" crossorigin="anonymous"></script>
  <script language="JavaScript" type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="/css/styles.css">
  <link rel="stylesheet" href="/css/app.css">
  <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

</head>
<body>
  <div id="app">

    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between  shadow-sm">
      <a class="navbar-brand" href="/">
        @guest
        <img src="{{ url('/img/userlogo/logo-default.png') }}" alt="">
        @else
        <img src="{{ url('/img/userlogo/',Auth::user()->Empresa->logo) }}" alt="">
        @endguest

      </a>

      @guest
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      @else
      @if(Auth::user()->es_empresa)
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      @else
      <img  style="max-width:64px; border: none; !IMPORTANT;"  src="/img/useravatar/{{ Auth::user()->avatar }}" class="rounded-circle navbar-toggler"  data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      @endif
      @endguest


      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav ml-auto" id="menu">
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesion') }}</a>
          </li>

          @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
          </li>
          @endif
          @else
          <li class="nav-item @if(Route::current()->uri =='cursos') active @endif">
            <a class="nav-link" href="{{ route('cursos.index') }}">Mis Cursos</a>
          </li>
          <li class="nav-item @if(Route::current()->uri =='miPerfil') active @endif">
            <a class="nav-link " href="{{ route('miPerfil') }}">Mi Perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>
          </li>
          @if(!Auth::user()->es_empresa)
          <li id="avatarimagen" class="nav-item @if(Route::current()->uri =='miPerfil') active @endif">
            <a  href="{{ route('miPerfil') }}">
              <img  src="/img/useravatar/{{ Auth::user()->avatar }}" style="width:4rem; height:4rem; border-radius: 50%">
            </a>
          </li>
          @endif
          @endguest
        </ul>

      </div>
    </nav>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>

    <main class="py-4">
      @yield('content')
    </main>

  </div>
</body>

<script type="text/javascript">

$(document).ready(function(){
  @yield('jquerys')

});


</script>
</html>
