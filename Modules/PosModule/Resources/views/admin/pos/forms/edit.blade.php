{{-- uuid hidden --}}
<input type="hidden" name="uuid" id="uuid_edit" value="{{ $data->uuid }}">

{{-- name --}}
<div class="row">
  <div class="col-md-12">
    <div class="card card-outline-info">
      <div class="card-body">
        <div class="row">

          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <select class="form-control select2" name="vehicle_id" id="vehicle_id_edit" onchange="getVehicleDataEdit()">
                <option value="{{ $data->userVehicle->id }}" data-user="{{ $data->user->name . ' ' . $data->user->lastname }}" data-brand="{{ $data->userVehicle->brand }}" data-model="{{ $data->userVehicle->model }}">
                    Cliente: {{ $data->user->name . ' ' . $data->user->lastname }} - DNI: {{ $data->user->dni }} - Patente: {{ $data->userVehicle->vehicle_plate }}</option>
                @foreach ($vehicles as $vehicle)
                    @if ($vehicle->id != $data->userVehicle->id)
                        <option value="{{ $vehicle->id }}" data-user="{{ $vehicle->user->name . ' ' . $vehicle->user->lastname }}" data-brand="{{ $vehicle->brand }}" data-model="{{ $vehicle->model }}">
                            Cliente: {{ $vehicle->user->name . ' ' . $vehicle->user->lastname }} - DNI: {{ $vehicle->user->dni }} - Patente: {{ $vehicle->vehicle_plate }}</option>
                    @endif
                @endforeach
            </select>
        </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fas fa-user color-white"></i></span>
              <span class="input-group-text" id="basic-addon1">Nombre del cliente</span>
              <input type="text" name="name" id="name_edit" class="form-control" readonly>
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fas fa-car color-white"></i></span>
              <span class="input-group-text" id="basic-addon1">Marca del vehiculo</span>
              <input type="text" name="description" id="brand_edit" class="form-control" readonly>
            </div>
          </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-6">
            <div class="input-group input-icon right ">
              <span class="input-group-addon"><i class="fas fa-car color-white"></i></span>
              <span class="input-group-text" id="basic-addon1">Modelo del vehiculo</span>
              <input type="text" name="duration" id="model_edit" class="form-control" readonly>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
