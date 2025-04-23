{{-- uuid hidden --}}
<input type="hidden" name="uuid" id="uuid_edit" value="{{ $data->uuid }}">
{{-- fileUpload --}}
<div id="input_hidden_edit"></div>{{-- necesario para carga de imagenes y arhivos --}}



<div class="card custom-card">
    <div class="card-header">
        <div class="card-title">
            Editar Datos del Usuario
        </div>
    </div>
    <div class="card-body">
        <div class="row d-flex mt-3">

            <div class="mt-3 col-md-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-text-width"></i></span>
                    <span class="input-group-text" id="basic-addon1">Nombre</span>
                    <input type="text" class="form-control" placeholder="Ingrese el nombre"
                        aria-describedby="basic-addon1" id="name" name="name" value="{{ $data->name ?? 'ERROR' }}" required>
                </div>
            </div>

            <div class="mt-3 col-md-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-text-width"></i></span>
                    <span class="input-group-text" id="basic-addon1">Apellido</span>
                    <input type="text" class="form-control" placeholder="Ingrese el apellido"
                        aria-describedby="basic-addon1" id="lastname" name="lastname" value="{{ $data->lastname ?? 'ERROR' }}" required>
                </div>
            </div>

            <div class="mt-3 col-md-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-text-width"></i></span>
                    <span class="input-group-text" id="basic-addon1">Telefono</span>
                    <input type="text" class="form-control" placeholder="Ingrese el telefono"
                        aria-describedby="basic-addon1" id="phone" name="phone" value="{{ $data->phone ?? 'ERROR' }}"  required>
                </div>
            </div>

            <div class="mt-3 col-md-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-text-width"></i></span>
                    <span class="input-group-text" id="basic-addon1">Email</span>
                    <input type="text" class="form-control" placeholder="Ingrese el email"
                        aria-describedby="basic-addon1" id="email" name="email" value="{{ $data->email ?? 'ERROR' }}"  required>
                </div>
            </div>

        </div>
    </div>
</div>


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

                            @if($data->getMedia('image_header')->last())
                            <div class="image-container position-relative">
                                <span class="border border-primary border-container rounded">
                                <img src="{{ asset($data->getMedia('image_header')->last()->url)}}" alt="..." class="img-fluid  rounded" >
                                </span>
                                <div class="close-image position-absolute">
                                    <button type="button" data-id="{{ $data->getMedia('image_header')->last()->id }}" class="btn btn-delete" onclick="deleteMedia({{ $data->getMedia('image_header')->last()->id }}, this)"><i class="ri-close-line"></i></button>
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


@if(auth()->user()->hasRole('superadmin'))
<div class="card custom-card">
    <div class="card-header">
        <div class="card-title">
            Roles
        </div>
    </div>
    <div class="card-body">
        <div class="row d-flex mt-3">
            <div class="mt-3 col-md-12">
                <div class="input-group" style="text-align:left">
                    <select id="todos_los_roles" name="rol1" class="form-control rol1 todos_los_roles">
                    @foreach($roles as $rol)
                    <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                    @endforeach
                    </select>
                    <span class="input-group-btn" id="asignar_rol">
                    <button type="button" class="btn btn-primary" onclick="asignarRol();">
                        <i class="fa fa-check"></i> Asignar Roles
                    </button>
                    </span>
                </div>
            </div>

            <div class="mt-3 col-md-12">
                Roles asignados:
                <h3>
                <div id="etiqueta_roles_asignados">
                    @foreach($data->getRoles() as $rl)

                    <span class="badge bg-warning">
                        {{ $rl->name }}
                        <span class="remove-role" style="cursor:pointer;" onclick="quitarRol({{ $rl->id }})">
                            &times;
                        </span>
                    </span>

                    @endforeach
                </h3>
                </div>
            </div>

        </div>
    </div>
</div>
@endif





