<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="logo">
          <img src="https://bantolin.nyc3.digitaloceanspaces.com/fotos/bancodos.png" alt="">
        </div>
        <div class="form">
            <div class="divform">
                <form class="formulario" action="{{url('sesion')}}" method="post">
                    @csrf
                    <h3 style="color: white">Bantolinpel</h3>
                    <br>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"></span>
                        <input name="email" type="text" class="form-control" placeholder="Correo" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"></span>
                        <input name="password" type="password" class="form-control" placeholder="Controaseña" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                      <button class="btn btn-primary btn-lg" type="submit">Iniciar sesión</button>
                </form>
            </div>
        </div>
      </div>
</body>

@if (session('msg') == 'credenciales no validas')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'credenciales no validas',
    })
</script>
@endif

@if (session('msg') == 'singOut')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
        Swal.fire({
        position: 'center',
        icon: 'success',
        title:'Adios',
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif

@if (session('msg') == 'Username does not exist')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'El usuario no existe',
    })
</script>
@endif
</html>
