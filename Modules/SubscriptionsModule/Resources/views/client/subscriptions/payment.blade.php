

{{-- Extiende la plantilla base --}}
@extends('layouts.theme-admin.volgh.index')

@section('other-css')

@endsection

{{-- Sección del título del módulo --}}
@section('title-module')
    <div>
        <h1 class="page-title"><img src="{{ asset('theme-admin/volgh/assets/images/icon/credit-card.svg') }}" alt="" width="50" height="50" class="responsive"> Suscripción Cliente</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{!! URL::to('/') !!}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{!! URL::to('/cashflow') !!}">Suscripción</a></li>
        </ol>
    </div>
@endsection

{{-- Contenido principal --}}
@section('content')
@include('flash::message')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Pagar Suscripcion</h3>
                                </div>
                                <div class="row  d-flex justify-content-center align-items-center">
                                    <div class="col-sm-12 plan-type" data-type="{{ $plan->type }}" >
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <div class="card-category">{{$plan->name}}</div>
                                                <p>{{$plan->description}}</p>
                                                <div class="display-4 my-4">${{$plan->price}}</div>
                                                <ul class="list-unstyled leading-loose">
                                                    @foreach($plan->services as $key => $service)
                                                    <li><i class="fe fe-check text-success mr-2"></i> {{$service->name}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body bg-white">

                                    <div class="d-flex justify-content-center">
                                        <img src="{{asset('theme-admin/volgh/assets/images/logos/mp-logo.png')}}" alt="Descripción de la imagen" class="img-fluid w-50 w-md-20">
                                    </div>

                                    <div id="cardPaymentBrick_container"></div>
                                    <input type="hidden" name="plan_uuid" id="plan_uuid" value="{{ $plan->uuid }}">
                                    <input type="hidden" name="subscription_uuid" id="subscription_uuid" value="{{ $subscription->uuid }}">
                                </div>



                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>






@section('mis-scripts')

<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    var publicKey = "{{ config('paymentmethodsmodule.payment_methods.mercadopago.public_key') }}";
    var planPrice = "{{ $plan->price }}";
    var planUuid = document.getElementById('plan_uuid').value;
    var subscriptionUuid = document.getElementById('subscription_uuid').value;

    const mp = new MercadoPago(publicKey, {
      locale: 'es-AR'
    });
    const bricksBuilder = mp.bricks();
    const renderCardPaymentBrick = async (bricksBuilder) => {
      const settings = {
        initialization: {
          amount: planPrice, // monto a ser pago
          payer: {
            email: "",
          },
        },
        customization: {
            visual: {
                style: {
                    theme: 'default' // 'dark'  | 'default' | 'bootstrap' | 'flat'
                }
            },
            paymentMethods: {
                types: {
                excluded: ['debit_card']
                },
                maxInstallments: 1,
            }
        },
        callbacks: {
          onReady: () => {
            // callback llamado cuando Brick esté listo
          },
          onSubmit: (cardFormData) => {
            //  callback llamado cuando el usuario haga clic en el botón enviar los datos
            //  ejemplo de envío de los datos recolectados por el Brick a su servidor
            return new Promise((resolve, reject) => {
              fetch("{{ route('client.pays.payment.subscription') }}", {
                method: "POST",
                headers: {
                  "Content-Type": "application/json",
                  "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    ...cardFormData,
                    planUuid: planUuid,
                    subscriptionUuid: subscriptionUuid
                })
              })
                .then((response) => {
                    window.location.href = "{{ route('client.pays.payment.success') }}";
                    resolve();
                })
                .catch((error) => {
                    window.location.href = "{{ route('client.pays.payment.error') }}";
                  reject();
                })
            });
          },
          onError: (error) => {
            // callback llamado para todos los casos de error de Brick
          },
        },
      };
      window.cardPaymentBrickController = await bricksBuilder.create('cardPayment', 'cardPaymentBrick_container', settings);
    };
    renderCardPaymentBrick(bricksBuilder);
</script>


@stop
@endsection
