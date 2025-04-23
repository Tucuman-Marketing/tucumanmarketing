<!-- LARGE MODAL -->
<div class="modal fade" id="edit">
	<div class="modal-dialog  modal-xl" role="document" swt>
		<div class="modal-content ">
			<div class="modal-header ">
				<h6 class="modal-title">Editar Servicio</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			{!!Form::open(['route'=>['admin.services.update'],'method'=>'PUT','files'=>True])!!}

			<div class="modal-body pd-20">

				<br>

				{{-- almacenamos el id del vehiculo --}}
				<input type="text" name="uuid" id="uuid_edit" hidden="">

				{{-- @include('vehicles::admin.vehicles.forms.changeImage') --}}

				@include('servicemodule::admin.services.forms.changeData')

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