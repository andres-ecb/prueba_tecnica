<div class="modal fade" id="editarCategoriaModal{{ $ctg->id }}" tabindex="-1" role="dialog" aria-labelledby="editarCategoriaModalLabel{{ $ctg->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('categorias.update', $ctg->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title">Editar Categoría <i class="fas fa-layer-group"></i></h5>
                    <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> 
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="{{ $ctg->nombre }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Actualizar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>