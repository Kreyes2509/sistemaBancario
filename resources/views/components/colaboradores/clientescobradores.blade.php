@extends('components.menu')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/loyout.css">
    <title>Cobradores</title>
</head>
<body>
    @section('title')
    <span style="font-size: 20px;font-weight: bold;">Cobradores</span>
    @endsection

    @section('container')
    <div class="container">
        <div class="container text-center">
            <div class="row">
                <div class="row row-cols-auto ">
                    <div class="col-10">
                        <div class="divcontbtninput">
                            <div class="input-group mb-1">
                                <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                <input id="myInput" type="text" name="nombreUsuario" class="form-control" placeholder="Buscar cobrador" aria-label="Username" aria-describedby="basic-addon1">
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
                    <th scope="col">Avales</th>
                    <th scope="col">Prestamos</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($clientes as $row)
                    <tr>
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
                        <td scope="col">
                            <a href="{{url('showavales',[$row->clienteID])}}"class="btn btn-primary">Avales</a>
                        </td>
                        <td scope="col">
                            <a href="{{url('showprestamos',[$row->clienteID])}}"class="btn btn-secondary">Prestamos</a>
                        </td>
                    </tr>
                @endforeach
        </tbody>
        </table>
        @if (count($clientes) <= 0)
            <h4>No tienes clientes asignados</h4>
        @endif
        </div>
        </div>
    </div>
    @endsection

    @include('components.filtros')


</body>
</html>
