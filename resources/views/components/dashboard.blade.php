@extends('components.menu')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/dashboard.css">
    <title>Doshboard</title>
</head>
<body>
    @section('title')
        <span style="font-size: 20px;font-weight: bold;">Dashboard</span>
    @endsection

    @section('container')
        <div class="container ">
            <div class="containerscroll">
                @if (Auth::user()->rolId == 1)
                    <div class="divContainer1 ">
                        <h1>Empleados</h1>
                        <div class="divscroll">
                            <table class="table table-light">
                                <thead class="table-primary">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">foto</th>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Nombre de usuario</th>
                                    <th scope="col">Cumpleaños</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Rol</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($empleados as $row)
                                        <tr>
                                            <td>{{$row->id}}</td>
                                            <td><img class="employeePhoto" src="{{$row->imagen}}" alt=""></td>
                                            <td>{{$row->nombres}}</td>
                                            <td>{{$row->apellidos}}</td>
                                            <td>{{$row->nombreUsuario}}</td>
                                            <td>{{$row->fechaCumple}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>{{$row->rol}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

                @if (Auth::user()->rolId == 1 || Auth::user()->rolId == 2)
                    <div class="divContainer1 ">
                        <h1>Cobradores</h1>
                        <div class="divscroll">
                            <table class="table table-light">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">foto</th>
                                        <th scope="col">Nombres</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">Nombre de usuario</th>
                                        <th scope="col">Cumpleaños</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Sueldo</th>
                                        <th scope="col">telefono</th>
                                        <th scope="col">Correo empresarial</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($cobradores as $row)
                                        <tr>
                                            <td>{{$row->id}}</td>
                                            <td><img class="cobradorPhoto" style="  width: 50px;
                                            height: 50px;" src="{{$row->imagen}}" alt=""></td>
                                            <td>{{$row->nombres}}</td>
                                            <td>{{$row->apellidos}}</td>
                                            <td>{{$row->nombreUsuario}}</td>
                                            <td>{{$row->fechaCumple}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>{{$row->sueldo}}</td>
                                            <td>{{$row->telefono}}</td>
                                            <td>{{$row->email_empresa}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="divContainer1 ">
                        <h1>Clientes</h1>
                        <div class="divscroll">
                            <table class="table table-light">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">nombres</th>
                                        <th scope="col">apellido paterno</th>
                                        <th scope="col">apellido materno</th>
                                        <th scope="col">direccionr</th>
                                        <th scope="col">numero exterior</th>
                                        <th scope="col">codigo postal</th>
                                        <th scope="col">ciudad</th>
                                        <th scope="col">estado</th>
                                        <th scope="col">telefono</th>
                                        <th scope="col">email</th>
                                        <th scope="col">empleo actual</th>
                                        <th scope="col">nombre empresa</th>
                                        <th scope="col">antiguedad</th>
                                        <th scope="col">telefono empresa</th>
                                        <th scope="col">direccion empresa</th>
                                        <th scope="col">situacion buro</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($clientes as $row)
                                        <tr>
                                            <td scope="col">{{$row->id}}</td>
                                            <td scope="col">{{$row->nombres}}</td>
                                            <td scope="col">{{$row->apellido_paterno}}</td>
                                            <td scope="col">{{$row->apellido_materno}}</td>
                                            <td scope="col">{{$row->direccion}}</td>
                                            <td scope="col">{{$row->numero_exterior}}</td>
                                            <td scope="col">{{$row->codigo_postal}}</td>
                                            <td scope="col">{{$row->ciudad}}</td>
                                            <td scope="col">{{$row->estado}}</td>
                                            <td scope="col">{{$row->telefono}}</td>
                                            <td scope="col">{{$row->email}}</td>
                                            <td scope="col">{{$row->empleo_actual}}</td>
                                            <td scope="col">{{$row->nombre_empresa}}</td>
                                            <td scope="col">{{$row->antiguedad}}</td>
                                            <td scope="col">{{$row->telefono_empresa}}</td>
                                            <td scope="col">{{$row->direccion_empresa}}</td>
                                            <td scope="col">{{$row->situacion_buro}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                      </div>
                @endif
            </div>
        </div>
    @endsection
</body>



@if (session('msg') == 'Bienvenido!')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Bienvenido',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif

@if (session('msg') == 'Cambia tu contraseña en el apartado de perfil')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Cambia tu contraseña en el apartado de perfil',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif


</html>
