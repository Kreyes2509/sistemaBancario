@extends('components.menu')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
    @endsection

    @include('components.filtros')

    
</body>
</html>
