<input type="text" name="uuid" id="uuid_edit" hidden="" value="{{$roles->uuid}}">
<div id="input_hidden_edit"></div> <!-- Contenedor para campos ocultos en el formulario de edición -->


<div class="card custom-card">
    <div class="card-header">
        <div class="card-title">
            Datos del Rol
        </div>
    </div>
    <div class="card-body">
        <div class="row d-flex">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-text-width"></i></span>
                    <span class="input-group-text" id="basic-addon1">Nombre</span>
                    <input type="text" class="form-control" placeholder="ingrese el nombre del rol" aria-label="Username"
                        aria-describedby="basic-addon1" id="name-edit" name="name" value="{{$roles->name}}" required >
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-text-width"></i></span>
                    <span class="input-group-text" id="basic-addon1">Descripcion</span>
                    <input type="text" class="form-control" placeholder="ingrese la Descripcion" aria-label="Username"
                        aria-describedby="basic-addon1" id="description-edit" name="description"  value="{{$roles->description}}" required>
                </div>
            </div>

        </div>

    </div>
</div>



<div class="card custom-card">
    <div class="card-header justify-content-between">
        <div class="card-title">Permisos</div>
        <div class="dropdown">
            <button type="button" class="btn btn-primary label-btn btn-wave label-end waves-effect waves-light" onclick="selectAllPermissions()">
                Seleccionar todo
                <i class="fas fa-check custom-icon label-btn-icon"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="row d-flex">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table card-table">
                                <tr class="border-bottom">
                                    <th>MODULOS</th>
                                    <th>ACCESO</th>
                                    <th>VER</th>
                                    <th>CREAR</th>
                                    <th>EDITAR</th>
                                    <th>ELIMINAR</th>
                                </tr>
                                @foreach ($permissions as $key => $module)
                                <tr class="border-bottom">
                                    <td>{!!$key!!}</td>
                                    @foreach ($module as $Permission)
                                          @if ($Permission->active == "yes")
                                            <td>
                                              <p>{{$Permission->slug}}</p>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input permission" type="checkbox" role="switch" id="switch-{{$Permission->slug}}" name="{{$Permission->slug}}" checked>
                                                <label class="form-check-label" for="switch-{{$Permission->slug}}"></label>
                                            </div>
                                            </td>
                                          @else
                                            <td>
                                              <p>{{$Permission->slug}}</p>
                                              <div class="form-check form-switch">
                                                <input class="form-check-input permission" type="checkbox" role="switch" id="switch-{{$Permission->slug}}" name="{{$Permission->slug}}" data-on="on">
                                                <label class="form-check-label" for="switch-{{$Permission->slug}}"></label>
                                            </div>
                                            </td>
                                          @endif
                                    @endforeach
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>












