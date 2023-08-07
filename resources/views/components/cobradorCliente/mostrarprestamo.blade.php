@extends('components.menu')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/loyout.css">
    <title>Prestamos</title>
</head>
<body>
    @section('title')
    <span style="font-size: 20px;font-weight: bold;">Prestamos</span>
@endsection

@section('container')
<div class="container">
    <div class="container text-center">
        <div class="row">
            <div class="row row-cols-auto ">
                <div class="col-2">
                </div>
                <div class="col-10">
                    <div class="divcontbtninput">
                        <div class="input-group mb-1">
                            <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                            <input id="myInput" type="text" name="nombreUsuario" class="form-control" placeholder="Buscar prestamo" aria-label="Username" aria-describedby="basic-addon1">
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
                    <th scope="col">Monto del prestamo</th>
                    <th scope="col">Intereses</th>
                    <th scope="col">Plazo</th>
                    <th scope="col">Fecha solicitud</th>
                    <th scope="col">Fecha de aprobación</th>
                    <th scope="col">Metodo de pago</th>
                    <th scope="col">Cuota mensual</th>
                    <th scope="col">Tipo de prestamo</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Garantia</th>
                    <th scope="col">Clientes</th>
                    <th scope="col">Autorizar</th>
                    <th scope="col">Detalle del prestamo</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($prestamos as $row)
                        <tr>
                            <td>{{$row->prestamoID}}</td>
                            <td>{{$row->monto_prestamo}}</td>
                            <td>20%</td>
                            <td>{{$row->plazo_pago}}</td>
                            <td>{{\Carbon\Carbon::parse($row->fecha_solicitud)->format('d/m/Y')}}</td>
                            @if ($row->fecha_aprobacion == null)
                                <td>En espera de aprovacion</td>
                            @else
                            <td>{{\Carbon\Carbon::parse($row->fecha_aprobacion)->format('d/m/Y')}}</td>
                            @endif
                            <td>{{$row->metodo_pago}}</td>
                            <td>{{$row->cuota}}</td>
                            <td>{{$row->tipo_prestamo}}</td>
                            @if ($row->estado_prestamo == 'PENDIENTE')
                            <td style="background-color: rgb(215, 172, 0);color:white">En espera de aprovacion</td>
                            @elseif ($row->estado_prestamo == 'ACTIVO')
                                <td style="background-color: green;color:white">Prestamo activo</td>
                            @else
                                <td style="background-color: rgb(146, 0, 0);color:white">Prestamo rechazado</td>
                            @endif
                            <td>{{$row->garantia}}</td>
                            <td>{{$row->nombres}}  {{$row->apellido_paterno}}</td>
                            @if ($row->estado_prestamo == 'PENDIENTE')
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal-{{$row->id}}">
                                        Autorizar prestamo
                                    </button>

                                    @include('components.Prestamos.modalupdateestatus')

                                </td>
                            @elseif ($row->estado_prestamo == 'ACTIVO')
                                <td style="background-color: green;color:white">Autorizado</td>
                            @else
                                <td style="background-color: rgb(146, 0, 0);color:white">Rechazado</td>
                            @endif
                            @if ($row->estado_prestamo == 'ACTIVO')
                                <td>
                                    <a href="{{url('showhistorialprestamo',[$row->prestamoID])}}"class="btn btn-secondary">Detalle</a>
                                </td>
                            @elseif ($row->estado_prestamo == 'PENDIENTE')
                                <td>En espera de aprobación</td>
                            @else
                                <td>Prestamo rechazado</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
</div>
@endsection
</body>
</html>
