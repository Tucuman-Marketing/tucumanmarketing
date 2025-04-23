<div class="row">
    <div class="col-md-12">
<div class="card card-outline-info">
   <div class="card-header">
       <h4 class="m-b-0 text-white">Cambiar Datos del Usuario</h4>
   </div>
   <div class="card-body">
        <div class="row">
                {{-- imagen a mostrar --}}
                @if ($data->media && $data->media->first())
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 d-flex justify-content-center">
                        <img src="{{ asset($data->media->first()?->url ?? 'theme-admin/velvet/assets/images/sin-imagen.jpg') }}" class="img-fluid" alt="Responsive image" height="250" width="250">
                    </div>
                @else
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 d-flex justify-content-center">
                        <img src="{{ asset('theme-admin/velvet/assets/images/sin-imagen.jpg') }}" class="img-fluid" alt="Responsive image" height="250" width="250">
                    </div>
                @endif

                <div class="form-group col-lg-6 col-md-8 col-sm-12 col-xs-12">
                    <div class="input-group input-icon right ">
                        <span class="input-group-addon">
                            <i class="fas fa-window-maximize color-white"></i>
                        </span>
                        <span class="input-group-text" id="basic-addon1">Ingrese el Nombre</span>
                        <input type="text" name="name" id="name" class="form-control" required=""
                        value="{{ $data->name ?? '' }}" readonly>
                    </div>
                </div>

                <div class="form-group col-lg-6 col-md-8 col-sm-12 col-xs-12">
                    <div class="input-group input-icon right ">
                        <span class="input-group-addon">
                            <i class="fas fa-window-maximize color-white"></i>
                        </span>
                        <span class="input-group-text" id="basic-addon1">Ingrese el Apellido</span>
                        <input type="text" name="lastname" id="lastname" class="form-control" required=""
                        value="{{ $data->lastname ?? '' }}" readonly>
                    </div>
                </div>

                <div class="form-group col-lg-6 col-md-8 col-sm-12 col-xs-12">
                    <div class="input-group input-icon right ">
                        <span class="input-group-addon">
                            <i class="fas fa-window-maximize color-white"></i>
                        </span>
                        <span class="input-group-text" id="basic-addon1">Ingrese el DNI</span>
                        <input type="text" name="dni" id="dni" class="form-control" required=""
                        value="{{ $data->dni ?? '' }}" readonly>
                    </div>
                </div>

                <div class="form-group col-lg-6 col-md-8 col-sm-12 col-xs-12">
                    <div class="input-group input-icon right ">
                        <span class="input-group-addon">
                            <i class="fas fa-window-maximize color-white"></i>
                        </span>
                        <span class="input-group-text" id="basic-addon1">Ingrese el Telefono</span>
                        <input type="text" name="phone" id="phone" class="form-control" required=""
                        value="{{ $data->phone ?? '' }}" readonly>
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
                        value="{{ $data->email ?? '' }}" readonly>
                    </div>
                </div>

        </div>
   </div>
 </div>
 </div>
</div>

