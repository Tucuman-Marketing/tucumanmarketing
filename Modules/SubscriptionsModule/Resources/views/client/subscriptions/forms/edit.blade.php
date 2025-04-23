<input type="text" name="uuid" id="uuid_edit" hidden="" value="{{$data->uuid}}">

<div class="row">
  <div class="col-md-12">
    <div class="card card-outline-info">
      <div class="card-header">
        <h4 class="m-b-0 text-white">Modificar Suscripcion</h4>
      </div>
      <div class="card-body">
        <div class="row">


            <div class="col-md-12" id="vehicle-div">
                <div class="form-group">
                    <label for="vehicle_id">Vehiculos</label>
                    <select class="form-control select2"  name="vehicle_uuid" id="vehicle_id">
                        <option value="">Seleccione una Opcion</option>
                        @foreach ($vehicles as $vehicle)
                            <option value="{{ $vehicle->uuid }}" {{ $data->userVehicle->uuid == $vehicle->uuid ? 'selected' : '' }}>
                                {{ $vehicle->brand }} {{ $vehicle->model }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-12" style="display: none;" id="plan-div">
                <div class="form-group">
                    <label for="plan_id">Planes</label>
                    <select class="form-control select2" name="plan_uuid" id="plan_id" required>
                        <option value="">Seleccione un Plan</option>
                        @foreach ($plans as $plan)
                            <option value="{{ $plan->uuid }}" {{ $data->plan->uuid == $plan->uuid ? 'selected' : '' }}>
                                {{ $plan->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>



        </div>
      </div>
    </div>
  </div>
</div>
