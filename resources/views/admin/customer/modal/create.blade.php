<div class="modal fade" id="create" role="dialog" aria-labelledby="confirmDelete">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Crear</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>

            {{ Form::open(['route'=>['admin.customers.store'], 'method'=>'POST' , 'files'=>True]) }}

            <div class="modal-body">
                @include('admin.customer.forms.create')
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-right">Crear</button>
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                {!!Form::close()!!}
            </div>

        </div>
    </div>
</div>
