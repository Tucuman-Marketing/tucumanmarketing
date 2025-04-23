{{-- uuid hidden --}}
<input type="hidden" name="uuid" id="uuid_edit" value="{{ $data->uuid }}">

<div class="row">
  <div class="col-md-12">
    <div class="card card-outline-info">
      <div class="card-header">
        <h5 class="m-b-0 text-white">Cambiar Datos del Usuario</h5>
      </div>
      <div class="card-body">

        <div class="row">

        <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <input type="file" class="dropify" data-height="200" name="file" data-default-file="{{ asset($data->media->first()->url ?? '') }}">
        </div>

        <div class="form-group col-lg-6 col-md-8 col-sm-12 col-xs-12">
            <div class="input-group input-icon right ">
                <span class="input-group-addon">
                    <i class="fas fa-window-maximize color-white"></i>
                </span>
                <span class="input-group-text" id="basic-addon1">Ingrese el Nombre</span>
                <input type="text" name="name" id="name" class="form-control" required=""
                value="{{ $data->name ?? '' }}">
            </div>
        </div>

        <div class="form-group col-lg-6 col-md-8 col-sm-12 col-xs-12">
            <div class="input-group input-icon right ">
                <span class="input-group-addon">
                    <i class="fas fa-window-maximize color-white"></i>
                </span>
                <span class="input-group-text" id="basic-addon1">Ingrese el Apellido</span>
                <input type="text" name="lastname" id="lastname" class="form-control" required=""
                value="{{ $data->lastname ?? '' }}">
            </div>
        </div>

        <div class="form-group col-lg-6 col-md-8 col-sm-12 col-xs-12">
            <div class="input-group input-icon right ">
                <span class="input-group-addon">
                    <i class="fas fa-window-maximize color-white"></i>
                </span>
                <span class="input-group-text" id="basic-addon1">Ingrese el DNI</span>
                <input type="text" name="dni" id="dni" class="form-control" required=""
                value="{{ $data->dni ?? '' }}">
            </div>
        </div>

        <div class="form-group col-lg-6 col-md-8 col-sm-12 col-xs-12">
            <div class="input-group input-icon right ">
                <span class="input-group-addon">
                    <i class="fas fa-window-maximize color-white"></i>
                </span>
                <span class="input-group-text" id="basic-addon1">Ingrese el Telefono</span>
                <input type="text" name="phone" id="phone" class="form-control" required=""
                value="{{ $data->phone ?? '' }}">
            </div>
        </div>

        <div class="form-group col-lg-6 col-md-8 col-sm-12 col-xs-12">
            <div class="input-group input-icon right ">
                <span class="input-group-addon">
                    <i class="fas fa-window-maximize color-white"></i>
                </span>
                <span class="input-group-text" id="basic-addon1">Ingrese el Email</span>
                <input type="text" name="email" id="email" class="form-control" required="" aria-required="true" data-msg-required="Please enter your email address."
                data-msg-email="Please enter a valid email address."
                value="{{ $data->email ?? '' }}">
            </div>
        </div>

        </div>

      </div>
    </div>
  </div>
</div>
