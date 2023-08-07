<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/menu.css">
    <title>Document</title>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            @yield('title')
        </div>
        <div class="profile">
            <img src="{{Auth::user()->imagen}}" alt="Foto de perfil">
            <h5>{{Auth::user()->nombreUsuario}}</h5>
        </div>
    </div>
    <div class="menu-toggle">
        @include('components.navbar')
    </div>
    <nav class="menu">
      <ul>
        <li><a href="/dashboard">dashboard</a></li><br>
        @if (Auth::user()->rolId == 1)
            <li><a href="/empleados">Empleados</a></li><br>
        @endif
            <li><a href="/clientes">Clientes</a></li><br>
        @if (Auth::user()->rolId == 1 || Auth::user()->rolId == 2)
            <li><a href="/cobradores">Cobradores</a></li><br>
            <li><a href="/avales">Avales</a></li><br>
            <li><a href="/prestamos">Prestamos</a></li><br>
        @endif
        <li><a href="{{url('singOut')}}">Cerrar Sesión</a></li><br>
      </ul>
    </nav>
    <div class="content">
      @yield('container')
    </div>
</body>
</html>
