<!-- ROW-1 OPEN -->
<div class="row">
	<div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title text-dark">Editar Imagen de Perfil</h3>
			</div>
			<div class="card-body">
				<div class="text-center">
					<div class="userprofile">
						<div class="userpic  brround">

							@if($user->getFirstMedia('image_header'))
                            <div class="image-container position-relative">
                                <span class="border border-primary border-container rounded">
                                <img src="{{ asset($user->getFirstMedia('image_header')->url)}}" alt="..." class="img-fluid  rounded" >
                                </span>
                            </div>
                            @else
                            <div class="image-container position-relative">
                                <span class="border border-primary border-container rounded">
                                <img src="{{ asset('theme-admin/velvet/assets/images/sin-imagen.jpg') }}" alt="..." class="img-fluid  rounded" >
                                </span>
                            </div>
                            @endif

							{{-- CAMBIO DE AVATAR --}}
							<span data-placement="top" data-bs-toggle="tooltip" title="Editar Perfil" class='pr-2'>
								<button type="button" class="btn btn-primary pr-3" data-bs-toggle="modal" data-bs-target="#edit-perfil">
									<i class="fe fe-camera"> </i>Editar
								</button>
							</span>
							{{-- CAMBIO DE AVATAR --}}
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="card">
			<div class="card-header">
				<h3 class="card-title text-dark">Editar Password</h3>
			</div>
			<div class="card-body">

				{{-- CAMBIO DE PASSWORD --}}
				{!!Form::model($user,['route'=>['admin.user.setting.change.password',$user->uuid],'method'=>'PUT' ,
				'files'=>True])!!}
				<div class="input-group mt-3">
					<span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
					<span class="input-group-text" id="basic-addon1">Contraseña Actual</span>
					<input type="password" class="form-control" value="password" name="password_actual" readonly>
				</div>

				<div class="input-group mt-3">
					<span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
					<span class="input-group-text" id="basic-addon1">Nueva Contraseña</span>
					<input type="password" class="form-control" name="password" required>
				</div>

				<div class="input-group mt-3">
					<span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
					<span class="input-group-text" id="basic-addon1">Confirmar Contraseña</span>
					<input type="password" class="form-control" name="password_confirmation" required>
				</div>
			</div>

			<div class="card-footer text-right">
				<button type="submit" class="btn btn-primary">Actualizar</button>
			</div>
			{!!Form::close()!!}
			{{-- CAMBIO DE PASSWORD --}}
		</div>
	</div>



	<div class="col-lg-8 col-xl-8 col-md-12 col-sm-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title text-dark">Edit Perfil</h3>
			</div>
			<div class="card-body">
				{{-- INFORMACION DEL USUARIO --}}
				{!!Form::model($user,['route'=>['admin.user.setting.change.info',$user->uuid],'method'=>'PUT' ,
				'files'=>True])!!}

				<div class="row">
					<div class="col-lg-6 col-md-12">
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
							<span class="input-group-text" id="basic-addon1">Nombre</span>
							<input type="text" class="form-control" placeholder="Ingrese el nombre"
								 name="name" value="{{$user->name}}" required>
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
							<span class="input-group-text" id="basic-addon1">Apellido</span>
							<input type="text" class="form-control" placeholder="Ingrese el nombre"
								 name="lastname" value="{{$user->lastname}}" required>
						</div>
					</div>

					<div class="col-lg-6 col-md-12">
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon1"><i class="fas fa-address-card"></i></span>
							<span class="input-group-text" id="basic-addon1">DNI</span>
							<input type="text" class="form-control" placeholder="Ingrese el nombre"
								 name="dni" value="{{$user->dni}}" required>
						</div>
					</div>

					<div class="col-lg-6 col-md-12">
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon1"><i class="fas fa-address-card"></i></span>
							<span class="input-group-text" id="basic-addon1">Direccion</span>
							<input type="text" class="form-control" placeholder="Ingrese el nombre"
								 name="address" value="{{$user->address}}" required>
						</div>
					</div>

					<div class="col-lg-6 col-md-12">
						<div class="input-group mt-3">
							<span class="input-group-text" id="basic-addon1"><i class="fas fa-address-card"></i></span>
							<span class="input-group-text" id="basic-addon1">Celular</span>
							<input type="text" class="form-control" placeholder="Ingrese el nombre"
								 name="phone" value="{{$user->phone}}" required>
						</div>
					</div>
				</div>

			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Actualizar</button>

			</div>
			{!!Form::close()!!}

		</div>
	</div>
</div>
