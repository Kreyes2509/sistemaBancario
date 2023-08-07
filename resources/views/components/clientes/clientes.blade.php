@extends('components.menu')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="/css/loyout.css">
    <title>Clientes</title>
</head>
<body>
        @section('title')
            <span style="font-size: 20px;font-weight: bold;">Clientes</span>
        @endsection

        @section('container')
        <div class="container">
            <div class="container text-center">
                <div class="row">
                    <div class="row row-cols-auto ">
                        <div class="col-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Nuevo
                            </button>
                        </div>
                        <div class="col-10">
                            <div class="divcontbtninput">
                                <div class="input-group mb-1">
                                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                    <input id="myInput" type="text" name="nombreUsuario" class="form-control" placeholder="Buscar cliente" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divContainer1">
            <div class="divscroll">
                <table id="myTable1" class="table table-light">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellido paterno</th>
                        <th scope="col">Apellido materno</th>
                        <th scope="col">Direccionr</th>
                        <th scope="col">Numero exterior</th>
                        <th scope="col">Codigo postal</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Email</th>
                        <th scope="col">Empleo actual</th>
                        <th scope="col">Sueldo</th>
                        <th scope="col">Nombre empresa</th>
                        <th scope="col">Antiguedad</th>
                        <th scope="col">Telefono empresa</th>
                        <th scope="col">Direccion empresa</th>
                        <th scope="col">Situacion buro</th>
                        <th scope="col">Actualizar</th>
                        <th scope="col">Eliminar</th>
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
                            <td scope="col">{{$row->sueldo}}</td>
                            <td scope="col">{{$row->nombre_empresa}}</td>
                            <td scope="col">{{$row->antiguedad}}</td>
                            <td scope="col">{{$row->telefono_empresa}}</td>
                            <td scope="col">{{$row->direccion_empresa}}</td>
                            <td scope="col">{{$row->situacion_buro}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal-{{$row->id}}">
                                    Actualizar
                                </button>

                                @include('components.clientes.clientesupdate')

                            </td>
                            <td>
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$row->id}}">
                                    Eliminar
                                </button>


                                @include('components.clientes.clientesdelete')

                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
        @endsection

        @include('components.clientes.clientesadd')

        @include('components.filtros')

        @if ($errors->any())
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    title: 'Error de validación',
                    text: '{{ $errors->first() }}',
                    icon: 'error',
                    confirmButtonText: 'Cerrar'
                });
            </script>
        @endif


        @if (session('msg') == 'añadido correctamente')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
                Swal.fire({
                position: 'center',
                icon: 'success',
                title:'Añadido correctamente',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
        @endif

        @if (session('msg') == 'actualizado correctamente')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
                Swal.fire({
                position: 'center',
                icon: 'success',
                title:'Actualizado correctamente',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
        @endif

        @if (session('msg') == 'eliminado correctamente')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
                Swal.fire({
                position: 'center',
                icon: 'success',
                title:'eliminado correctamente',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
        @endif

        @if (session('msg') == 'ocurrio un error')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Eocurrio un error',
            })
        </script>
        @endif

</body>
</html>
