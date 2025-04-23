<input type="hidden" name="plan_uuid" id="create_plan_uuid">


<div class="row">

    <div class="col-md-12">
        <div class="card">

            <div class="card-body">

                @if($vehicles->count() > 0)
                <div class="col-md-12" id="vehicle-div">
                    <div class="form-group">
                        <label for="vehicle_id">Vehiculos</label>
                        <select class="form-control select2" name="vehicle_uuid" id="vehicle_id">
                            <option value="">Seleccione una Opcion</option>
                            @foreach ($vehicles as $vehicle)
                                <option value="{{ $vehicle->uuid }}" data-type="{{ $vehicle->type }}">
                                    {{ $vehicle->brand }} {{ $vehicle->model }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @else
                <div class="alert alert-warning text-center" role="alert">
                    No hay vehículos cargados. Para continuar, tienes que cargar un vehículo.
                    <a href="{{ route('client.vehicles.index') }}">
                        Haz clic aquí para cargar un vehículo.
                    </a>
                </div>
                @endif

            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Planes</h5>
            </div>
            <div class="card-body">
                <div id="plan-div" style="display: none;">
                    <div class="row  d-flex justify-content-center align-items-center">
                        @foreach ($plans as $plan)
                            <div class="col-sm-6 col-lg-4 plan-type" data-type="{{ $plan->type }}" style="display: none;">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="card-category">{{$plan->name}}</div>
                                        <p>{{$plan->description}}</p>
                                        <div class="display-4 my-4">${{$plan->price}}</div>
                                            <ul class="list-unstyled leading-loose">
                                                @foreach($plan->services as $key => $service)
                                                <li><i class="fe fe-check text-success mr-2"></i> {{$service->name}}</li>
                                                @endforeach
                                                <li><i class="fe fe-check text-success mr-2"></i> Cantidad de Vehiculos: {{$plan->quantity_vehicles}}</li>
                                            </ul>
                                        <div class="text-center mt-6">
                                            <button type="submit" class="btn btn-primary btn-block subscribe-button" onclick="selectedPlan('{{ $plan->uuid }}')">Suscribirse</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



@section('mis-scripts')
@parent

<script>
$('#vehicle_id').change(function() {
    var vehicleUuid = $(this).val(); // Obtiene el ID del vehículo seleccionado
    if (vehicleUuid) {
        $('#plan-div').show();
    } else {
        $('#plan-div').hide();
    }
});
</script>

    <script>
        function selectedPlan(planUuid) {
            $('#create_plan_uuid').val(planUuid); // Establece el ID del plan en el campo oculto
            $('#create_subscription_form').submit(); // Envía el formulario
        }
    </script>

    {{-- Script para cambiar el plan segun el tipo de vehiculo elegido --}}


<script>
$('#vehicle_id').change(function() {
    var selectedVehicleType = $('option:selected', this).data('type'); // Obtiene el tipo de vehículo seleccionado
    if (selectedVehicleType) {
        // Muestra el div de los planes
        $('#plan-div').show();
        // Oculta todos los planes
        $('.plan-type').hide();
        // Muestra solo los planes que corresponden al tipo de vehículo seleccionado
        $('.plan-type[data-type="' + selectedVehicleType + '"]').show();
    } else {
        // Si no se seleccionó ningún vehículo, oculta todos los planes
        $('#plan-div').hide();
    }
});
</script>


@stop
