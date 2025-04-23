<div class="card card-outline-info">
  <div class="card-header p-1">
    <h4>Datos del vehiculo</h4>
  </div>
  <div class="card-body">
    <div class="row">

      <div class="form-group col-xs-12 col-sm-12 col-md-12">
        <select class="form-control select2" name="vehicle_id" id="vehicle_id" onchange="getVehicleData()">
          <option value="">Ingrese Cliente/DNI/Patente</option>
          @foreach ($vehicles as $vehicle)
          <option value="{{ $vehicle->id }}" data-user="{{ $vehicle->user->name . ' ' . $vehicle->user->lastname }}"
            data-brand="{{ $vehicle->brand }}" data-model="{{ $vehicle->model }}"
            data-subscription="{{ $vehicle->relevantSubscription() ? $vehicle->relevantSubscription()->status : '' }}">
            Cliente: {{ $vehicle->user->name . ' ' . $vehicle->user->lastname }} - DNI: {{$vehicle->user->dni}} - Patente: {{ $vehicle->vehicle_plate }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group col-xs-12 col-sm-12 col-md-6">
        <div class="input-group input-icon right ">
          <span class="input-group-addon"><i class="fas fa-user color-white"></i></span>
          <span class="input-group-text" id="basic-addon1">Nombre del cliente</span>
          <input type="text" name="name" id="user_name" class="form-control" readonly>
        </div>
      </div>

      <div class="form-group col-xs-12 col-sm-12 col-md-6">
        <div class="input-group input-icon right ">
          <span class="input-group-addon"><i class="fas fa-car color-white"></i></span>
          <span class="input-group-text" id="basic-addon1">Marca del vehiculo</span>
          <label for="vehicle_brand"></label>
          <input type="text" class="form-control" id="vehicle_brand" name="vehicle_brand" readonly>
        </div>
      </div>

      <div class="form-group col-xs-12 col-sm-12 col-md-6">
        <div class="input-group input-icon right ">
          <span class="input-group-addon"><i class="fas fa-car color-white"></i></span>
          <span class="input-group-text" id="basic-addon1">Modelo del vehiculo</span>
          <label for="vehicle_model"></label>
          <input type="text" class="form-control" id="vehicle_model" name="vehicle_model" readonly>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="card">
  <div class="card-header p-1">
    <h4>Información de suscripción</h4>
  </div>
  <div class="card-body">

    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mx-auto text-center" style="display: none;" id="subscription-none">
      <div class="card bg-dark img-card box-dark-shadow">
        <div class="card-header">SUSCRIPCION</div>
        <div class="card-body">
          <div class="d-flex">
            <div class="text-white">
              <h2 class="mb-0 number-font"></h2>
              <p class="text-white mb-0">SIN SUSCRIPCION</p>
            </div>
            <div class="ml-auto"> <i class="fas fa-dollar-sign text-white fs-30 mr-2 mt-2"></i> </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mx-auto text-center" style="display: none;"
      id="subscription-pagado">
      <div class="card bg-success img-card box-dark-shadow">
        <div class="card-header">SUSCRIPCION</div>
        <div class="card-body">
          <div class="d-flex">
            <div class="text-white">
              <h2 class="mb-0 number-font"></h2>
              <p class="text-white mb-0">PAGADA</p>
            </div>
            <div class="ml-auto"> <i class="fas fa-dollar-sign text-white fs-30 mr-2 mt-2"></i> </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mx-auto text-center" style="display: none;"
      id="subscription-pendiente">
      <div class="card bg-warning img-card box-dark-shadow">
        <div class="card-header">SUSCRIPCION</div>
        <div class="card-body">
          <div class="d-flex">
            <div class="text-white">
              <h2 class="mb-0 number-font"></h2>
              <p class="text-white mb-0">PENDIENTE</p>
            </div>
            <div class="ml-auto"> <i class="fas fa-dollar-sign text-white fs-30 mr-2 mt-2"></i> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
