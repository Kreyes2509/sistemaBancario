 <!-- Modal Añadir-->
 <div class="modal fade" id="updateModal-{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Cobrador</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{url('cobradores',[$row->id])}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="input-group mb-3">
                  <input value="{{$row->nombres}}" type="text" class="form-control" name="nombres" placeholder="Nombres" aria-label="Username">
                  <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                  <input value="{{$row->apellidos}}" type="text" class="form-control" name="apellidos" placeholder="Apellidos" aria-label="Server">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input value="{{$row->nombreUsuario}}" type="text" name="nombreUsuario" class="form-control" placeholder="Nombre de ususario" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                  <input value="{{$row->fechaCumple}}" type="date"  name="fechaCumple" class="form-control" placeholder="correo" aria-label="Username" aria-describedby="basic-addon1">
              </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input value="{{$row->email}}" type="email"  name="email" class="form-control" placeholder="correo" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input value="{{$row->imagen}}" type="file" name="imagen" class="form-control" placeholder="Foto de perfil" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input value="{{$row->sueldo}}" type="text" name="sueldo" class="form-control" placeholder="sueldo" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input value="{{$row->telefono}}" type="text" maxlength="10" minlength="0" name="telefono" class="form-control" placeholder="telefono" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input value="{{$row->email_empresa}}" type="email" name="email_empresa" class="form-control" placeholder="correo empresarial" aria-label="Username" aria-describedby="basic-addon1">
                </div>

                <div class="d-grid col-6 mx-auto">
                    <button class="btn btn-primary" type="submit"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
  </div>
