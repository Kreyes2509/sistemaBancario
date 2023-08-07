@extends('components.menu')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="/css/loyout.css">
    <title>Avales</title>
</head>
<body>
        @section('title')
        <span style="font-size: 20px;font-weight: bold;">Avales</span>
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
                                    <input id="myInput" type="text" name="nombreUsuario" class="form-control" placeholder="Buscar aval" aria-label="Username" aria-describedby="basic-addon1">
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
                    <th scope="col">nombre completo</th>
                    <th scope="col">direccion</th>
                    <th scope="col">telefono</th>
                    <th scope="col">email</th>
                    <th scope="col">rfc</th>
                    <th scope="col">relacion con el cliente</th>
                    <th scope="col">monto avalado</th>
                    <th scope="col">fecha de inicio</th>
                    <th scope="col">fecha finalizacion</th>
                    <th scope="col">estado</th>
                    <th scope="col">cliente</th>
                    <th scope="col">Actualizar</th>
                    <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($avales as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->nombre_completo}}</td>
                            <td>{{$row->direccion}}</td>
                            <td>{{$row->telefono}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->rfc}}</td>
                            <td>{{$row->relacion_cliente}}</td>
                            <td>${{$row->monto_avalado}}</td>
                            <td>{{$row->fecha_inicio}}</td>
                            <td>{{$row->fecha_finalizacion}}</td>
                            @if ($row->estado == 'ACTIVO')
                                <td style="background-color: green;color:white">{{$row->estado}}</td>
                            @else
                                <td style="background-color: rgb(255, 0, 0);color:white">{{$row->estado}}</td>
                            @endif
                            <td>{{$row->cliente}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal-{{$row->id}}">
                                    Actualizar
                                </button>

                                @include('components.avales.avalesupdate')

                            </td>
                            <td>
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$row->id}}">
                                    Eliminar
                                </button>

                                @include('components.avales.avalesdelete')

                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
        @endsection

        @include('components.avales.avalesadd')

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
