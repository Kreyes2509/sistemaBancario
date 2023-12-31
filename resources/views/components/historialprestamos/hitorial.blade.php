@extends('components.menu')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/loyout.css">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Detalle del prestamo</title>
</head>
<body>
    @section('title')
        <span style="font-size: 20px;font-weight: bold;">Historial de pagos</span>
    @endsection

    @section('container')
    <div class="container text-center">
        <div class="row">
            <div class="row row-cols-auto ">
                <div class="col-2">
                    @if ($habilitarBotonCobrador >= 3)
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Asignar cobrador
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
    @endsection

    @include('components.historialprestamos.asignarcobrador')

    @if (session('msg') == 'añadido correctamente')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
            Swal.fire({
            position: 'center',
            icon: 'success',
            title:'Cobrador asignado',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
    @endif

    <script>
        // Contador para llevar el tiempo
        let counter = 0;

        // Función para refrescar la página cada 10 segundos
        function refreshPage() {
        // Incrementar el contador en 1
        counter++;

        // Si el contador llega a 10 (10 segundos), refrescar la página
        if (counter === 20) {
            location.reload();
        }
        }

        // Ejecutar la función refreshPage cada segundo (1000 milisegundos)
        setInterval(refreshPage, 1000);
    </script>

</body>
</html>
