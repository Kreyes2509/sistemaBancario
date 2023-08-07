<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{url('generarplanpago',[$row->prestamoID])}}">
                @csrf
                <div style="width: 60%;margin: 0 auto;padding: 20px;">
                    <div>
                        <img style="width: 150px;height 150px;" src="https://bantolin.nyc3.digitaloceanspaces.com/fotos/iconoPrestamo.png" alt="">
                    </div><br>
                    <div>
                        <h5>Asignar un plan de pago?</h5>
                    </div>
                </div>
                <br>
                <div class="d-grid col-6 mx-auto">
                    <button class="btn btn-warning"><i class="fa-solid fa-floppy-disk" type="submit"></i>Autorizar</button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
  </div>