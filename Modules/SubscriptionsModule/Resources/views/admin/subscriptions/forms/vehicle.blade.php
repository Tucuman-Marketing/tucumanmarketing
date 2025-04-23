
@if($data->count() > 0)
    <div class="form-group">
        <label for="vehicle_id">Vehiculos</label>
        <select class="form-control select2"  name="vehicle_uuid" id="vehicle_id">
            <option value="">Seleccione una Opcion</option>
            @foreach ($data as $vehicle)
                <option value="{{ $vehicle->uuid }}" data-type="{{ $vehicle->type }}">{{ $vehicle->brand }} {{ $vehicle->model }}</option>
            @endforeach
        </select>
    </div>
@else
    <div class="alert alert-warning text-center" role="alert">
        Este cliente aun no tiene vehiculos asociados, tienes que cargar un vehiculo.
        <a href="{{ route('admin.vehicles.index') }}">
            Haz clic aquí para cargar un vehiculo.
        </a>
    </div>
@endif

