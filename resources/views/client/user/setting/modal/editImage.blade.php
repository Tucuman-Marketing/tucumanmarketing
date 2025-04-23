<!-- LARGE MODAL -->
<div class="modal fade" id="edit-perfil" tabindex="-1" aria-labelledby="exampleModalXlLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title">Editar Usuario</h6>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>


            <form action="{{ route('admin.user.setting.change.photo')}}" method="POST" enctype="multipart/form-data" id="edit-form">
                @csrf
                @method('PUT')



			<div class="modal-body pd-20">

				{{-- almacenamos el id del usuario --}}
				<input type="text" name="uuid_perfil_edit" id="uuid_perfil_edit" hidden="" value="{{$user->uuid}}">

                <div id="input_hidden_edit"></div>

                <div class="row">
                  <div class="col-xl-12">
                      <div class="card custom-card">
                          <div class="card-header">
                              <div class="card-title">
                                  Imagen de portada
                              </div>
                          </div>
                          <div class="card-body">
                              <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12" >
                                  <div class="card custom-card product-card" >
                                      <div class="card-body d-flex justify-content-center align-items-center flex-wrap">

                                        @if($user->getMedia('image_header')->last())
                                        <div class="image-container position-relative">
                                            <span class="border border-primary border-container rounded">
                                            <img src="{{ asset($user->getMedia('image_header')->last()->url)}}" alt="..." class="img-fluid  rounded" >
                                            </span>
                                            <div class="close-image position-absolute">
                                                <button type="button" data-id="{{ $user->getMedia('image_header')->last()->id }}" class="btn btn-delete" onclick="deleteMedia({{ $user->getMedia('image_header')->last()->id }}, this)"><i class="ri-close-line"></i></button>
                                            </div>
                                        </div>
                                        @else
                                        <div class="image-container position-relative">
                                            <span class="border border-primary border-container rounded">
                                            <img src="{{ asset('theme-admin/velvet/assets/images/sin-imagen.jpg') }}" alt="..." class="img-fluid  rounded" >
                                            </span>
                                        </div>
                                        @endif

                                      </div>
                                  </div>
                              </div>

                               <!--  Image Simple  -->
                               <input type="file" class="filepond_single" name="image_single" id="image_single" data-form-type="edit" />
                               <p class="help-block">{{ $errors->first('image_single.*') }}</p>

                          </div>
                      </div>
                  </div>
                </div>


			</div><!-- modal-body -->
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Guardar</button>
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div><!-- MODAL DIALOG -->
</div>
<!-- LARGE MODAL CLOSED -->
