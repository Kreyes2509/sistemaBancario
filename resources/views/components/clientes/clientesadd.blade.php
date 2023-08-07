 <!-- Modal Añadir-->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir Clientes</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{url('clientes')}}">
                @csrf
                <div class="input-group mb-3">
                  <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                  <input type="text" class="form-control" name="nombres" placeholder="Nombres" aria-label="Username">
                  <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                  <input type="text" class="form-control" name="apellido_paterno" placeholder="Apellido paterno" aria-label="Server">
                  <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                  <input type="text" name="apellido_materno" class="form-control" placeholder="Apellido materno" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                  <input type="text" name="direccion" class="form-control" placeholder="Dirección" aria-label="Username" aria-describedby="basic-addon1">
              </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input type="text" name="numero_exterior" class="form-control" placeholder="Numero exterior" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input type="text" name="codigo_postal" class="form-control" placeholder="codigo postal" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input type="text" name="ciudad" class="form-control" placeholder="Ciudad" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input type="text" name="estado" class="form-control" placeholder="Estado" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input type="text" name="telefono" maxlength="10" minlength="0" class="form-control" placeholder="Telefono" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input type="email"  name="email" class="form-control" placeholder="Correo" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input type="text" class="form-control" name="empleo_actual" placeholder="Empleo actual" aria-label="Username">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input type="text" class="form-control" name="nombre_empresa" placeholder="Empresa" aria-label="Server">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input type="text" name="antiguedad" class="form-control" placeholder="Antiguedad" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input type="text" name="telefono_empresa" maxlength="10" minlength="0" class="form-control" placeholder="Telefono de la empresa" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input type="text" name="direccion_empresa" class="form-control" placeholder="direccion de la empresa" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                    <input type="text" name="sueldo" class="form-control" placeholder="sueldo" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <label for="">Situacion en el buro de credito</label>
                <select class="form-select" name="situacion_buro">
                    <option value="bueno">Bueno</option>
                    <option value="Historial crediticio negativo">Historial crediticio negativo</option>
                    <option value="Reportes de pagos atrasados">Reportes de pagos atrasados</option>
                    <option value="Deudas impagas">Deudas impagas</option>
                    <option value="Consultas frecuentes de crédito">Consultas frecuentes de crédito</option>
                    <option value="Cancelación de tarjetas de crédito">Cancelación de tarjetas de crédito</option>
                    <option value="Uso excesivo de crédito">Uso excesivo de crédito</option>
                </select><br>
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
