@extends('components.menu')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/loyout.css">
    <title>Document</title>
</head>
<body>
    @section('title')
    <span style="font-size: 20px;font-weight: bold;">Historial de pagos</span>
    @endsection

    @section('container')
    <div class="divContainer1">
        <div class="divscroll">
            <table id="myTable1" class="table table-light">
            <thead class="table-primary">
                <tr>
                <th scope="col">Periodo</th>
                <th scope="col">Folio</th>
                <th scope="col">Concepto</th>
                <th scope="col">Total a pagar</th>
                <th scope="col">Pagado</th>
                <th scope="col">Fecha de vencimiento</th>
                <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($historal as $row)
                    <tr>
                        <th scope="col">{{$row->periodo}}</th>
                        <th scope="col">{{$row->folio}}</th>
                        <th scope="col">{{$row->concepto}}</th>
                        <th scope="col">{{$row->total}}</th>
                        <th scope="col">{{$row->pagado}}</th>
                        <th scope="col">{{$row->fechaVencimiento}}</th>
                        @if ($row->estado_pago == 'PENDIENTE')
                            <th scope="col" style="background-color: rgb(215, 172, 0);color:white">{{$row->estado_pago}}</th>
                        @elseif ($row->estado_pago == 'LIQUIDADO')
                            <th scope="col" style="background-color: green;color:white">{{$row->estado_pago}}</th>
                        @else
                            <th scope="col" style="background-color: rgb(146, 0, 0);color:white">Pago retrasado</th>
                        @endif
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>

    <div class="container text-center">
        <div class="row">
            <div class="row row-cols-auto ">
                <div class="col-2">
                    @if ($validarBoton < 1)
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Generar Plan de pago
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="divContainer1">
        <div class="divscroll">
            <table id="myTable1" class="table table-light">
            <thead class="table-primary">
                <tr>
                <th scope="col">Periodo</th>
                <th scope="col">Cuota</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($planPago as $row)
                    <tr>
                        <th scope="col">{{$row->plazo_pago}}</th>
                        <th scope="col">{{$row->cuota}}</th>
                    </tr>
                @endforeach
            </tbody>
            </table>
            @if (count($planPago) <= 0)
            <h4>No tienes un plan de pago asignado</h4>
        @endif
        </div>
    </div>

    @include('components.cobradorCliente.addplanpago')


    @endsection

    @if (session('msg') == 'añadido correctamente')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
            Swal.fire({
            position: 'center',
            icon: 'success',
            title:'Plan de pago generado',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
    @endif
</body>
</html>
