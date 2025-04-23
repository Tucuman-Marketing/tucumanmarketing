<div class="modal fade" id="modal-create" role="dialog" aria-labelledby="confirmDelete">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Crear </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">×</span></button>
      </div>



      {{ Form::open(['route' => ['setting.company.store'], 'method' => 'POST', 'files'=>True]) }}

      <div class="modal-body">

        @include('receipts::admin.receipt.forms.create')
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary pull-right">Crear</button>
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        {!!Form::close()!!}
      </div>


    </div>
  </div>
</div>
