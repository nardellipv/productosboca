<div class="modal fade" id="compra-{{ $buy->id }}" tabindex="-1" role="dialog" aria-labelledby="compraLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="compraLabel">Detalle de la compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <b>Nombre: </b> {{ $buy->name }} {{ $buy->lastname }} <br>
                <b>Email: </b> {{ $buy->email }} <br>
                <b>Dirección: </b> {{ $buy->address }} <br>
                <b>Provincia: </b> {{ $buy->state }} <br>
                <b>Localidad: </b> {{ $buy->dity }} <br>
                <b>CP: </b> {{ $buy->postalcode }} <br>
                <b>Teléfono: </b> {{ $buy->phone }} <br>
                <b>Nota: </b> {{ $buy->note }} <br>
                <b>Pago: </b> {{ $buy->payment }} <br>
                <b>Número compra: </b> {{ $buy->serial_buy }} <br>
                <b>Cantidad: </b> {{ $buy->quantity }} <br>
                <b>Total: </b> ${{ $buy->total }} <br>
                <b>Producto_id: </b> {{ $buy->product_id }} <br>
                <b>Fecha Compra: </b> {{ $buy->created_at }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>