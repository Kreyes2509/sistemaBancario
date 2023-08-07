 <!-- Modal Añadir-->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Asignar cobrador</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{url('storeclicobra',[$idCliente])}}">
                @csrf
                <label for="">Cobradores</label>
                <select class="form-select" name="cobrador">
                    @foreach ($cobradores as $row)
                        <option value="{{$row->id}}">{{$row->nombres}} {{$row->apellidos}}</option>
                    @endforeach
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
