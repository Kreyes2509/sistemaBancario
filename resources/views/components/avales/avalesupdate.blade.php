 <!-- Modal Añadir-->
 <div class="modal fade" id="updateModal-{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Aval</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('avales',[$row->id])}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <input value="{{$row->nombre_completo}}" type="text" name="nombre_completo" class="form-control" placeholder="Nombre completo" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <input value="{{$row->direccion}}" type="text" name="direccion" class="form-control" placeholder="Direccion" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <input value="{{$row->telefono}} " type="text" name="telefono" maxlength="10" minlength="0" class="form-control" placeholder="Telefono" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <input value="{{$row->email}}" type="email" name="email" class="form-control" placeholder="Correo" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <input value="{{$row->rfc}}" type="text" name="rfc"  class="form-control" placeholder="RFC" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <input value="{{$row->relacion_cliente}}" type="text" name="relacion_cliente"  class="form-control" placeholder="Relacion con el cliente" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <input value="{{$row->monto_avalado}}" type="text" name="monto_avalado"  class="form-control" placeholder="Monto avalado" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <label for="">Fecha de inicio</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <input value="{{$row->fecha_inicio}}" type="date" name="fecha_inicio"  class="form-control" placeholder="Fecha de inicio" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <label for="">Fecha finalizacion</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                        <input value="{{$row->fecha_finalizacion}}" type="date" name="fecha_finalizacion"  class="form-control" placeholder="Fecha finalizacion" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <label for="">Cliente</label>
                    <select class="form-select" name="clienteID">
                        @foreach ($clientes as $row)
                            <option value="{{$row->id}}">{{$row->nombres}} {{$row->apellido_paterno}} {{$row->apellido_materno}}</option>
                        @endforeach
                    </select><br>
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
