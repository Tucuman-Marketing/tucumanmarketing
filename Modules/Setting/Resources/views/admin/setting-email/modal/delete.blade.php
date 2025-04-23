<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirmar Eliminacion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <p>Esta seguro que desea eliminar Los Datos?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Cerrar</button>

                {!! Form::open(['method' => 'DELETE', 'route' => ['setting.email.delete']]) !!}

                {{-- almacenamos el id del usuario --}}
                @if ($settingEmail != null)
                <input type="text" name="uuid_delete" id="uuid_delete" hidden="" value="{{$settingEmail->uuid}}">
                @endif
               

                <button type="submit" class="btn btn-danger">Eliminar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>