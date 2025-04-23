<div class="card card-outline-info">
  <div class="card-header">
    <h4 class="m-b-0 text-white">Datos del Plan</h4>
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
                <option value="Moto">Moto</option>
                <option value="Auto">Auto</option>
                <option value="SUV">SUV</option>
                <option value="Camioneta">Camioneta</option>

            </select>
        </div>
    </div>

    <div class="form-group col-lg-6 col-md-8 col-sm-12 col-xs-12">
        <div class="input-group input-icon right ">
            <span class="input-group-addon">
                <i class="fas fa-window-maximize color-white"></i>
            </span>
            <span class="input-group-text" id="basic-addon1">ingrese el nombre</span>
            <input type="text" name="name" id="name" class="form-control" required="">
        </div>
    </div>


    <div class="form-group col-lg-6 col-md-8 col-sm-12 col-xs-12">
        <div class="input-group input-icon right ">
            <span class="input-group-addon">
                <i class="fas fa-window-maximize color-white"></i>
            </span>
            <span class="input-group-text" id="basic-addon1">ingrese la descripción</span>
            <input type="text" name="description" id="description" class="form-control">
        </div>
    </div>

    <div class="form-group col-lg-6 col-md-8 col-sm-12 col-xs-12">
        <div class="input-group input-icon right ">
            <span class="input-group-addon">
                <i class="fas fa-window-maximize color-white"></i>
            </span>
            <span class="input-group-text" id="basic-addon1">Ingrese la frecuencia</span>
            <select name="frequency" id="frequency" class="form-control selec2" required="">
                {{-- <option value="">Seleccione una opcion</option> --}}
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
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
                <option value="months" selected>Mensual</option>
                <option value="months">Anual</option>
            </select>
        </div>
    </div>

    {{-- <div class="form-group col-xs-12 col-sm-12 col-md-6">
        <div class="input-group input-icon right">
            <span class="input-group-addon"><i class="mdi mdi-account-box color-white"></i></span>
            <input type="number" name="repetitions" id="repetitions" class="form-control" placeholder="Ingrese las repeticiones" required>
        </div>
    </div> --}}

    <div class="form-group col-lg-6 col-md-8 col-sm-12 col-xs-12">
        <div class="input-group input-icon right ">
            <span class="input-group-addon">
                <i class="fas fa-window-maximize color-white"></i>
            </span>
            <span class="input-group-text" id="basic-addon1">Ingrese el día de facturación</span>
            <select name="billing_day" id="billing_day" class="form-control selec2" required="">
                @for ($i = 1; $i <= 30; $i++)
                    <option value="{{ $i }}" {{ $i == 1 ? 'selected' : '' }}>{{ $i }}</option>
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
            <input type="number" name="price" id="price" class="form-control" required="">
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
                    <option value="{{ $i }}" {{ $i == 1 ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>
    </div>


      <div class="form-group col-xs-12 col-sm-12 col-md-12">
        <div class="input-group input-icon right">
            <label for="plan_id">Agregar los Servicios que tendrá el Plan</label>
            <select class="form-control select2" name="service_id[]" id="service_id" style="width: 200px;" multiple required>
                <option value="" disabled>Seleccione uno o más servicios</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>
    </div>



    </div>
  </div>
</div>
