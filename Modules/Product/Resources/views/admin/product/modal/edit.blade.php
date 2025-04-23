<div class="modal fade" id="edit" role="dialog" aria-labelledby="editLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            {{-- Este formulario debería apuntar a la ruta de actualización de categorías en tu aplicación Laravel --}}
            {{-- El método del formulario debe ser POST, pero Laravel utilizará el campo _method para tratarlo como una solicitud PUT/PATCH --}}
            <form id="form_edit" action="{{ route('admin.product.update', ['product' => '__id__']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- uuid hiiden --}}
                <input type="hidden" name="uuid" id="uuid_edit" value="">

                <div class="modal-body">
                    {{-- Campo para el nombre de la categoría --}}
                    <div class="form-group">
                        <label for="description_edit">Nombre</label>
                        <input type="text" class="form-control" id="description_edit" name="description" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-right">Guardar Cambios</button>
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

