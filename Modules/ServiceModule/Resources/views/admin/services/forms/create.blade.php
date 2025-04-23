{{-- <div class="card card-outline-info"> --}}
  {{-- <div class="card-header">
    <h4 class="m-b-0 text-white">Foto del Vehiculo</h4>
  </div>
  <div class="card-body">
    <div class="row">

      <div class="form-group col-xs-12 col-sm-12 col-md-12">
        <img src="storage/users/avatar-default.svg" class="mx-auto d-block" height="150" width="150">
      </div>


      <div class="form-group col-xs-12 col-sm-12 col-md-12">
        <input type="file" class="dropify" data-height="200" name="image">
      </div>

    </div>
  </div>
</div> --}}

<div class="card card-outline-info">
  <div class="card-header">
    <h4 class="m-b-0 text-white">Datos del Servicio</h4>
  </div>
  <div class="card-body">
    <div class="row">

      <div class="form-group col-xs-12 col-sm-12 col-md-6">
        <div class="input-group input-icon right ">
            <span class="input-group-addon">
                <i class="fas fa-pencil color-white"></i>
            </span>
            <span class="input-group-text" id="basic-addon1">Nombre del Servicio</span>
          <input type="text" name="name" id="name_edit" class="form-control" placeholder=""
            required="">
        </div>
      </div>

      <div class="form-group col-xs-12 col-sm-12 col-md-6">
        <div class="input-group input-icon right ">
            <span class="input-group-addon">
                <i class="fas fa-pencil color-white"></i>
            </span>
            <span class="input-group-text" id="basic-addon1">Descripción del Servicio</span>
          <input type="text" name="description" id="description_edit" class="form-control" placeholder=""
            required="">
        </div>
      </div>

      <div class="form-group col-xs-12 col-sm-12 col-md-6">
        <div class="input-group input-icon right ">
            <span class="input-group-addon">
                <i class="fas fa-dollar-sign color-white"></i>
            </span>
            <span class="input-group-text" id="basic-addon1">Precio del Servicio</span>
          <input type="text" name="price" id="price_edit" class="form-control" placeholder=""
            required="">
        </div>
      </div>



      <div class="form-group col-xs-12 col-sm-12 col-md-6">
        <div class="input-group input-icon right" id="icon-re-password">
            <span class="input-group-addon"><i class="fas fa-power-off"></i></span>

            <span class="input-group-addon">


                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" style="color: rgb(197, 193, 193)" for="flexSwitchCheckDefault">¿Activo?</label>
                </div>

            </span>

        </div>
      </div>

    </div>
  </div>
</div>
