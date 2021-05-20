<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- EDITOR WYSIWYG -->
    <script src="{{ asset('/vendors/ckeditor/ckeditor.js') }}"></script>
    
    <title>Ins cami de mar | Pagaments</title>
    <link href="css.css" rel="stylesheet" type="text/css">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/5e3210ef40.js" crossorigin="anonymous"></script>
    
    <!-- Styles -->
    <link href="{{ url('/css/styles.css') }}" rel="stylesheet">

  </head>
  <body>
    
    <div class="container">
      <div  class="p-3" style="background-image: url({{ url('/images/star2.png') }});">
          <div class="row">
            <div class="col-3">
              <img src="{{ url('/images/logo_2.png') }}" class="w-100" alt="logo INS Camí de Mar">
            </div>
            <div class="col-3"></div>
            <div style="margin-top:2%;" class="col-6">
              <h1 style="font-size:2em;">INS Camí de Mar</h1>
              <h3 style="font-size:1em;">Web de pagaments de l'INS Camí de Mar de Calafell</h3>
            </div>
          </div>
      </div>
      <!-- FINAL DEL HEADER -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="text-white mx-2" href="/home">Inici</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               @guest
                @inject('categorias','App\Http\Controllers\CategoriaController')
                {{ $categorias->categoriasMenu() }}
                <li>
                    <a href="{{route('login')}}" class="text-white float-right px-4">Login</a>
                </li>
                <li>
                    <a href="{{route('register')}}" class="text-white float-right px-4">Register</a>
                </li>
                @endguest
                @auth
                <li><a class="text-white" href="/cursos">Cursos</a></li>
                <li><a class="text-white" href="/categories">Categories</a></li>
                <li><a class="text-white" href="/comptes">Comptes</a></li>
                <li><a class="text-white" href="/pagaments">Pagaments</a></li>
                <!-- Me aseguro que el usuario registrado tiene el rol de administrador para poder acceder a usuarios -->
                @if (Auth::user()->rol===0)
                <li><a class="text-white" href="/usuaris">Usuaris</a></li>
                @endif

                <li>
                  <a class="text-white float-right px-4" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" hidden>
                      @csrf
                  </form>
                </li>
                @endauth

                </ul>

                </div>
              </nav>
      <!-- FINAL DEL NAVBAR -->
      <div class="bg-white p-5 ">
        @yield('content')
      </div>
      <footer class="bg-light p-3 text-center">
        <a href="https://www.inscamidemar.cat/">Ins Camí de Mar</a> - Calafell
      </footer>
    <!-- FINAL DEL CONTAINER -->
    </div>

   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    @yield('postscripts')
  </body>
</html>


