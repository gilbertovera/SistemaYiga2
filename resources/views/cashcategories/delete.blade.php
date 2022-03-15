{{-- !-- Delete Warning Modal -->  --}}
<form action="{{ route('cashcategories.destroy', $cashcategory->idcashcategories) }}" method="POST">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">¿Está seguro que desea eliminar la categoría: "{{ $cashcategory->name }}" ?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger">Sí, Eliminar Categoría</button>
    </div>
</form>