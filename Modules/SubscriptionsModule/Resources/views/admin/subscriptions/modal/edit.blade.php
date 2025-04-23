<!-- LARGE MODAL -->
<div class="modal fade" id="edit">
	<div class="modal-dialog  modal-xl" role="document">
		<div class="modal-content ">
			<div class="modal-header ">
				<h6 class="modal-title">Editar Vehiculo</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			{!!Form::open(['route'=>['admin.subscriptions.update'],'method'=>'PUT','files'=>True])!!}

			<div class="modal-body pd-20">

                <div id="content-edit"></div>

			</div><!-- modal-body -->
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Guardar</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div><!-- MODAL DIALOG -->
</div>
<!-- LARGE MODAL CLOSED -->

