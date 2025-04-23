{{-- uuid hidden --}}
<input type="hidden" name="uuid" id="uuid_edit" value="{{ $data->uuid }}">

{{-- name --}}
<div class="row">
  <div class="col-md-12">
    <div class="card card-outline-info">
      <div class="card-header">
        <h4 class="m-b-0 text-white">Cambiar Datos del Plan</h4>
      </div>
      <div class="card-body">

        <div class="row">

            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="input-group input-icon right ">
                    <span class="input-group-addon">
                        <i class="fas fa-car color-white"></i>
                    </span>
                    <span class="input-group-text" id="basic-addon1-type">Tipo de Vehículo</span>
                    <select name="type" id="type" class="form-control selec2" required="">
                        <option value="">Seleccione un tipo de vehículo</option>
                        <option value="Moto" @if($data->type == 'Moto') selected @endif>Moto</option>
                        <option value="Auto" @if($data->type == 'Auto') selected @endif>Auto</option>
                        <option value="SUV" @if($data->type == 'SUV') selected @endif>SUV</option>
                        <option value="Camioneta" @if($data->type == 'Camioneta') selected @endif>Camioneta</option>

                    </select>
                </div>
            </div>


        <div class="form-group col-lg-6 col-md-8 col-sm-12 col-xs-12">
            <div class="input-group input-icon right ">
                <span class="input-group-addon">
                    <i class="fas fa-window-maximize color-white"></i>
                </span>
                <span class="input-group-text" id="basic-addon1">ingrese el nombre</span>
                <input type="text" name="name" id="name_edit_plans" class="form-control" required=""
                value="{{ isset($data->name) ? $data->name : '' }}">
            </div>
        </div>

        <div class="form-group col-lg-6 col-md-8 col-sm-12 col-xs-12">
            <div class="input-group input-icon right ">
                <span class="input-group-addon">
                    <i class="fas fa-window-maximize color-white"></i>
                </span>
                <span class="input-group-text" id="basic-addon1">ingrese la descripción</span>
                <input type="text" name="description" id="description_edit_plans" class="form-control"
                value="{{ isset($data->description) ? $data->description : '' }}" >
            </div>
        </div>

        <div class="form-group col-lg-6 col-md-8 col-sm-12 col-xs-12">
            <div class="input-group input-icon right ">
                <span class="input-group-addon">
                    <i class="fas fa-window-maximize color-white"></i>
                </span>
                <span class="input-group-text" id="basic-addon1">Ingrese la frecuencia</span>
                <select name="frequency" id="frequency" class="form-control selec2" required="">
                    @for ($i = 1; $i <= 6; $i++)
                        <option value="{{ $i }}" {{ $i == $data->frequency ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="form-group col-lg-6 col-md-8 col-sm-12 col-xs-12">
            <div class="input-group input-icon right ">
                <span class="input-group-addon">
                    <i class="fas fa-car color-white"></i>
                </span>
                <span class="input-group-text">Tipo de Frecuencia</span>
                <select name="frequency_type" id="frequency_type" class="form-control selec2" required="">
                    <option value="">Seleccione un opcion</option>
                    <option value="months" {{ $data->frequency_type == 'months' ? 'selected' : '' }}>Mensual</option>
                    <option value="years" {{ $data->frequency_type == 'years' ? 'selected' : '' }}>Anual</option>
                </select>
            </div>
        </div>

        <div class="form-group col-lg-6 col-md-8 col-sm-12 col-xs-12">
            <div class="input-group input-icon right ">
                <span class="input-group-addon">
                    <i class="fas fa-window-maximize color-white"></i>
                </span>
                <span class="input-group-text" id="basic-addon1">Ingrese el día de facturación</span>
                <select name="billing_day" id="billing_day" class="form-control selec2" required="">
                    @for ($i = 1; $i <= 30; $i++)
                        <option value="{{ $i }}" {{ $i == $data->billing_day ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="form-group col-lg-6 col-md-8 col-sm-12 col-xs-12">
            <div class="input-group input-icon right ">
                <span class="input-group-addon">
                    <i class="fas fa-window-maximize color-white"></i>
                </span>
                <span class="input-group-text" id="basic-addon1">Ingrese el precio</span>
                <input type="number" name="price" id="price" class="form-control"
                value="{{ isset($data->price) ? $data->price : '' }}" required="">
            </div>
        </div>

        <div class="form-group col-lg-6 col-md-8 col-sm-12 col-xs-12">
            <div class="input-group input-icon right ">
                <span class="input-group-addon">
                    <i class="fas fa-window-maximize color-white"></i>
                </span>
                <span class="input-group-text" id="basic-addon1">Ingrese la cantidad de vehiculos</span>
                <select name="quantity_vehicles" id="quantity_vehicles" class="form-control selec2" required="">
                    @for ($i = 1; $i <= 30; $i++)
                        <option value="{{ $i }}" {{ $i == $data->quantity_vehicles ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>


          <div class="form-group col-xs-12 col-sm-12 col-md-12">
            <label for="services">Servicios</label>
            <select class="form-control select2" multiple id="services" name="services[]" multiple="multiple" required>
                @foreach($services as $id => $name)
                    <option value="{{ $id }}" {{ in_array($id, $data->services->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
        </div>

        </div>
      </div>
    </div>
  </div>
</div>
