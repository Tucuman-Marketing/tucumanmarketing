{{-- fileUpload --}}
<div id="input_hidden"></div>{{-- necesario para carga de imagenes y arhivos --}}

<div class="card custom-card">
    <div class="card-header">
        <div class="card-title">
            Imagen de portada
        </div>
    </div>
    <div class="card-body">
        <div class="row d-flex mt-3">
            <div class="col-md-12">
                <!-- Image Single -->
                <label for="image_single" class="form-label">Imagen de portada</label>
                <input type="file" class="filepond_single" name="image_single" id="image_single"
                    data-form-type="create" />
                <p class="help-block">{{ $errors->first('image_single.*') }}</p>
            </div>
        </div>
    </div>
</div>


<div class="card custom-card">
    <div class="card-header">
        <div class="card-title">
            Datos del Usuario
        </div>
    </div>
    <div class="card-body">
        <div class="row d-flex mt-3">

            <div class="mt-3 col-md-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-text-width"></i></span>
                    <span class="input-group-text" id="basic-addon1">Nombre</span>
                    <input type="text" class="form-control" placeholder="Ingrese el nombre"
                        aria-describedby="basic-addon1" id="name" name="name" required>
                </div>
            </div>

            <div class="mt-3 col-md-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-text-width"></i></span>
                    <span class="input-group-text" id="basic-addon1">Apellido</span>
                    <input type="text" class="form-control" placeholder="Ingrese el apellido"
                        aria-describedby="basic-addon1" id="lastname" name="lastname" required>
                </div>
            </div>

            <div class="mt-3 col-md-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-text-width"></i></span>
                    <span class="input-group-text" id="basic-addon1">Telefono</span>
                    <input type="text" class="form-control" placeholder="Ingrese el telefono"
                        aria-describedby="basic-addon1" id="phone" name="phone" required>
                </div>
            </div>

            <div class="mt-3 col-md-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-text-width"></i></span>
                    <span class="input-group-text" id="basic-addon1">Email</span>
                    <input type="text" class="form-control" placeholder="Ingrese el email"
                        aria-describedby="basic-addon1" id="email" name="email" required>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="card custom-card">
    <div class="card-header">
        <div class="card-title">
            Generar Password
        </div>
    </div>
    <div class="card-body">
        <div class="row d-flex">

            <div class="mt-3 col-md-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-window-maximize"></i></span>
                    <span class="input-group-text" id="basic-addon1">Password</span>
                    <input type="password" class="form-control" placeholder="Ingrese el password"
                        aria-describedby="basic-addon1" id="password" name="password" required>
                </div>
            </div>

            <div class="mt-3 col-md-6">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-window-maximize"></i></span>
                    <span class="input-group-text" id="basic-addon1">Re-Password</span>
                    <input type="password" class="form-control" placeholder="Re-ingrese el password"
                        aria-describedby="basic-addon1" id="re-password" name="password_confirmation" required>
                </div>
            </div>


        <div class="mt-3 col-xs-12 col-sm-12 col-md-6">
            <div class="input-group input-icon right" id="icon-password">
              <button type="button" class="btn btn-button btn-primary" onclick="PasswordGenerate();">Generar
                Password</button>
              <input type="text" disabled="" class="form-control" id="label-password">
            </div>
          </div>

        </div>
    </div>
</div>
