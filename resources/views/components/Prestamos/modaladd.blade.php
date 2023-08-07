 <!-- Modal Añadir-->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Prestamo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{url('prestamos')}}">
                @csrf
                <label for="">Cliente</label>
                <select class="form-select" name="cliente" id="cliente_id">
                    <option value="">Seleccionar cliente</option>
                    @foreach ($clientes as $row)
                        <option value="{{$row->id}}">{{$row->nombres}} {{$row->apellido_paterno}} {{$row->apellido_materno}}</option>
                    @endforeach
                </select><br>
                <label for="">Monto autorizado</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input type="text" id="monto" readonly name="monto_prestamo" class="form-control" placeholder="Monto prestamo" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <label for="">Mensualidades</label>
                <select class="form-select" name="plazo_pago">
                    <option value="">Plazo</option>
                    <option value="6">6</option>
                    <option value="9">9</option>
                    <option value="12">12</option>
                </select><br>
                <label for="">Metodo de pago</label>
                <select class="form-select" name="metodo_pago">
                    <option value="">Metodo</option>
                    <option value="Nomina">nomina</option>
                    <option value="Transferencias electrónicas">Transferencias electrónicas</option>
                    <option value="Pago en efectivo en sucursal">Pago en efectivo en sucursal</option>
                </select><br>
                <label for="">Prestamo</label>
                <select class="form-select" name="tipo_prestamo">
                    <option value="">Tipo de Prestamo</option>
                    <option value="Hipotecario">Hipotecario</option>
                    <option value="Personal">Personal</option>
                    <option value="Automotriz">Automotriz</option>
                </select><br>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input type="text" name="garantia" class="form-control" placeholder="Garantia" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="d-grid col-6 mx-auto">
                    <button class="btn btn-primary"><i class="fa-solid fa-floppy-disk" type="submit"></i> Guardar</button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
  </div>
