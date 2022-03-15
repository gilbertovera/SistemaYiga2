{{-- !-- Delete Warning Modal -->  --}}
<form action="{{ route('cashmovs.destroy', $cashmov->idcashmovs) }}" method="POST">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">¿Está seguro que desea eliminar el movimiento ID: "{{ $cashmov->idcashmovs }}"?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger">Sí, Eliminar Movimiento</button>
    </div>
</form>