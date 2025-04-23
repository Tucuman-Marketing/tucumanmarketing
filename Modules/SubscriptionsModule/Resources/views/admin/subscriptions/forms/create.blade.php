<input type="hidden" name="plan_uuid" id="create_plan_uuid">

<div class="row">
    {{-- CARD DATOS --}}
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">DATOS</h5>
            </div>
            <div class="card-body">
                <div class="row">

                    @if($clients->count() > 0)
                        <div class="col-md-12" id="client-div">
                            <div class="form-group">
                                <label for="client_id">Cliente</label>
                                <select class="form-control select2"  name="client_uuid" id="client_id">
                                    <option value="">Seleccione un cliente</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->uuid }}">{{ $client->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-warning text-center" role="alert">
                            No hay clientes cargados. Para continuar, tienes que cargar un cliente.
                            <a href="{{ route('admin.customers.index') }}">
                                Haz clic aquí para cargar un cliente.
                            </a>
                        </div>
                    @endif


                    <div class="col-md-12">
                        <div id="vehicle-div"></div>
                    </div>


                    <div class="col-md-12">
                        <div id="plan-div"></div>
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>{{-- END ROW --}}





@section('mis-scripts')
@parent


<script>
    var urlGetVehicle = "{{ route('admin.subscriptions.getUserCars', ['id' => 'tempId']) }}";
    var urlGetPlans = "{{ route('admin.subscriptions.getPlans', ['id' => 'tempId']) }}";

    $(document).on('change', '#client_id', function() {
        var clientUuid = $(this).val();
        var url = urlGetVehicle.replace('tempId', clientUuid);
        $.get(url, function(response) {
            $('#vehicle-div').html(response);
            $('#vehicle-div .select2').select2();
        });
    });

    $(document).on('change', '#vehicle_id', function() {
        var vehicleUuid = $(this).val();
        var url = urlGetPlans.replace('tempId', vehicleUuid);
        if (vehicleUuid == '') { // Si se selecciona "Seleccione una Opcion"
                $('#plan-div').hide(); // Ocultar el div
        } else {
            $.get(url, function(response) {
                $('#plan-div').html(response);
                $('#plan-div .select2').select2();
            });
            $('#plan-div').show();
        }
    });

    function selectedPlan(planUuid) {
        $('#create_plan_uuid').val(planUuid); // Establece el ID del plan en el campo oculto
        $('button[type=submit]').prop('disabled', true);
        $('#create_subscription_form').submit(); // Envía el formulario
    }

</script>
@stop
