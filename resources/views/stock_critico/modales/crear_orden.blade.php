<div class="modal fade" id="reponerModal-{{ $prd->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title">
                    Crear Orden de Reposición <i class="fas fa-cart-flatbed"></i></i>
                </h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('ordenes.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="producto_id" value="{{ $prd->id }}">

                    <div class="mb-3">
                        <label class="form-label">
                            Producto
                        </label>

                        <input 
                            type="text"
                            class="form-control"
                            value="{{ $prd->nombre }}"
                            disabled
                        >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Stock Actual
                        </label>

                        <input 
                            type="text"
                            class="form-control"
                            value="{{ $prd->stock_actual }}"
                            disabled
                        >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Stock Mínimo
                        </label>

                        <input 
                            type="text"
                            class="form-control"
                            value="{{ $prd->stock_minimo }}"
                            disabled
                        >
                    </div>

                    <div class="mb-3">
                        @php
                            $faltante = abs($prd->stock_actual - $prd->stock_minimo);
                        @endphp
                        <label class="form-label">
                            Cantidad a solicitar
                        </label>

                        <input 
                            type="number"
                            name="cantidad"
                            class="form-control"
                            min="1"
                            value="{{ $faltante }}"
                            required
                        >
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <button type="submit" class="btn btn-info">
                        Crear Orden
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>