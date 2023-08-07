@extends('components.menu')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/loyout.css">
    <title>Perfil</title>
</head>
<body>
    @section('title')
        <span style="font-size: 20px;font-weight: bold;">Mi Perfil</span>
    @endsection

    @section('container')
    <div class="container">
        <div class="container text-center">
            <div class="row">
                <div class="row row-cols-auto ">
                    <div class="col-12">
                        <form method="POST" action="{{url('perfilupdate',[Auth::user()->id])}}" enctype="multipart/form-data" style="background: #124D84;border: 1px solid #ccc;border-radius: 10px;">
                            @csrf
                            <br>
                            <img src="{{Auth::user()->imagen}}" alt="" style="border-radius: 150px;width: 250px;height: 250px;"><br>
                            <label style="color: white" for="">Nombres</label>
                            <div class="input-group mb-3" style="width: 60%;margin: 0 auto;padding: 20px;">
                                <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                <input readonly type="text" id="monto" value="{{Auth::user()->nombres}}" class="form-control" placeholder="Nombres" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <label style="color: white" for="">Apellidos</label>
                            <div class="input-group mb-3" style="width: 60%;margin: 0 auto;padding: 20px;">
                                <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                <input readonly type="text" value="{{Auth::user()->apellidos}}" name="garantia" class="form-control" placeholder="Apellidos" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <label style="color: white" for="">Nombre de usuario</label>
                            <div class="input-group mb-3" style="width: 60%;margin: 0 auto;padding: 20px;">
                                <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                <input readonly type="text" value="{{Auth::user()->nombreUsuario}}" name="garantia" class="form-control" placeholder="Uusario" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <label style="color: white" for="">Cumpleaños</label>
                            <div class="input-group mb-3" style="width: 60%;margin: 0 auto;padding: 20px;">
                                <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                <input readonly type="text" id="monto" value="{{Auth::user()->fechaCumple}}" class="form-control" placeholder="Cumpleaños" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <label style="color: white" for="">Correo</label>
                            <div class="input-group mb-3" style="width: 60%;margin: 0 auto;padding: 20px;">
                                <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                <input readonly type="text" value="{{Auth::user()->email}}" name="garantia" class="form-control" placeholder="Correo" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <label style="color: white" for="">Cambiar contraseña</label>
                            <div class="input-group mb-3" style="width: 60%;margin: 0 auto;padding: 20px;">
                                <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                <input  type="password" name="password" class="form-control" placeholder="nueva contraseña" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="d-grid col-6 mx-auto">
                                <button class="btn btn-primary"><i class="fa-solid fa-floppy-disk" type="submit"></i> Guardar</button>
                            </div><br>
                        </form>
                    </div>
                    <div class="col-10">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection


    @if (session('msg') == 'actualizado correctamente')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
            Swal.fire({
            position: 'center',
            icon: 'success',
            title:'Datos actualizados',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
    @endif

</body>
</html>
