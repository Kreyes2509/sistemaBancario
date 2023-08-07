<div class="modal fade" id="updateModal-{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Autorizar prestamo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h4>Datos del cliente</h4><br>
            <form method="POST">
                @csrf
                <label style="text-align: left" for="">Nombre completo</label><br>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                  <input value="{{$row->nombres}}" type="text" class="form-control" name="nombres" placeholder="Nombres" aria-label="Username" readonly>
                  <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                  <input value="{{$row->apellido_paterno}}" type="text" class="form-control" name="apellidos" placeholder="Apellidos" aria-label="Server" readonly>
                  <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                  <input value="{{$row->apellido_materno}}" type="text" class="form-control" name="apellidos" placeholder="Apellidos" aria-label="Server" readonly>
                </div>
                <label style="text-align: left" for="">Dirección</label><br>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input value="{{$row->direccion}}" type="text" name="nombreUsuario" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input value="No: {{$row->numero_exterior}}" type="text" class="form-control" name="apellidos" placeholder="Apellidos" aria-label="Server" readonly>
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input value="CP: {{$row->codigo_postal}}" type="text" class="form-control" name="apellidos" placeholder="Apellidos" aria-label="Server" readonly>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                  <input value="{{$row->ciudad}}" type="text" class="form-control" name="nombres" placeholder="Nombres" aria-label="Username" readonly>
                  <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                  <input value="{{$row->estado}}" type="text" class="form-control" name="apellidos" placeholder="Apellidos" aria-label="Server" readonly>
                </div>
                <label style="text-align: left" for="">Contacto</label><br>
                  <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input value="Telefono: {{$row->telefono}}" type="text" name="nombreUsuario" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input value="Correo: {{$row->email}}" type="text" name="nombreUsuario" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" readonly>
                </div>
                <label style="text-align: left" for="">Datos de la empresa</label><br>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input value="Puesto: {{$row->empleo_actual}}" type="text" name="nombreUsuario" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input value="Sueldo: {{$row->sueldo}}" type="text" name="nombreUsuario" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input value="Empresa: {{$row->nombre_empresa}}" type="text" name="nombreUsuario" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input value="Antiguedad: {{$row->antiguedad}}" type="text" name="nombreUsuario" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input value="Telefono: {{$row->telefono_empresa}}" type="text" name="nombreUsuario" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input value="Dirección: {{$row->direccion_empresa}}" type="text" name="nombreUsuario" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" readonly>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input value="Situación buro: {{$row->situacion_buro}}" type="text" name="nombreUsuario" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" readonly>
                </div>
                <div class="d-grid gap-2 d-md-block">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#autorizarModal-{{$row->id}}">
                        Autorizar prestamo
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rechazarModal-{{$row->id}}">
                        Rechazar prestamo
                    </button>
                  </div>
            </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
  </div>

  @include('components.Prestamos.modalautorizar')

  @include('components.Prestamos.modalrechazar')
