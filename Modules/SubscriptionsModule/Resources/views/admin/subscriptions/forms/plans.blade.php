
<div class="row  d-flex justify-content-center align-items-center">
    @foreach ($data as $plan)
    <div class="col-sm-6 col-lg-4 plan-type" data-type="{{ $plan->type }}" >
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

