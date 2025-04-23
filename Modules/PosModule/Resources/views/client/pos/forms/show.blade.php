<div class="row">
  <div class="col-md-12">
    <div class="card card-outline-info">
      <div class="card-header">
        <h5 class="m-b-0 text-white">Ver Datos</h5>
      </div>
      <div class="card-body">

        <div class="row">

          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fas fa-user color-white"></i></span>
              <span class="input-group-text" id="basic-addon1">Nombre del cliente</span>
              <input type="text" name="name_show" id="name_show_washeds" class="form-control" required="" value="{{ $data->user->name . ' ' . $data->user->lastname ?? 'ERROR' }}" readonly>
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fas fa-car color-white"></i></span>
              <span class="input-group-text" id="basic-addon1">Patente</span>
              <input type="text" name="plate_show" id="plate_show_washeds" class="form-control" required="" value="{{ $data->userVehicle->vehicle_plate ?? 'ERROR' }}" readonly>
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fas fa-car color-white"></i></span>
              <span class="input-group-text" id="basic-addon1">Marca del vehiculo</span>
              <input type="text" name="brand_show" id="brand_show_washeds" class="form-control"
                required="" value="{{ $data->userVehicle->brand ?? 'ERROR' }}" readonly>
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fas fa-car color-white"></i></span>
              <span class="input-group-text" id="basic-addon1">Modelo del vehiculo</span>
              <input type="text" name="model_show" id="model_show_washeds" class="form-control" required="" value="{{ $data->userVehicle->model ?? 'ERROR' }}" readonly>
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fas fa-calendar-alt color-white"></i></span>
              <span class="input-group-text" id="basic-addon1">Fecha</span>
              <input type="text" name="date_show" id="model_show_washeds" class="form-control" required="" value="{{ $data->created_at ?? 'ERROR' }}" readonly>
            </div>
          </div>

          {{-- <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <label for="services">Servicios</label>
            <select class="form-control select2" multiple id="services" name="services[]" multiple="multiple" readonly>
                @foreach($services as $id => $name)
                    <option value="{{ $id }}" {{ in_array($id, $data->services->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
        </div> --}}

        </div>
      </div>
    </div>
  </div>
</div>
