<?php


namespace Modules\SubscriptionsModule\Http\Controllers\Client;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//MODELS
use Modules\SubscriptionsModule\Entities\Subscription;
use Modules\SubscriptionsModule\Entities\SubscriptionPay;
use Modules\SubscriptionsModule\Entities\SubscriptionPlan;
use Modules\SubscriptionsModule\Http\Services\Admin\Subscriptions\SubscriptionsSearchService;
use App\Models\User;
//CONTROLLERS
use App\Http\Controllers\AdminBaseController;
// LIBS
Use Alert;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
//service
use Modules\SubscriptionsModule\Http\Services\Admin\MercadoPago\MercadoPagoService;



class ClientSubscriptionPaysController extends AdminBaseController
{


    protected $mercadoPagoService;

    public function __construct(MercadoPagoService $mercadoPagoService)
    {
        parent::__construct();
        $this->mercadoPagoService = $mercadoPagoService;
    }

    public function payment(Request $request,$subscriptions)
    {
        $subscription =  Subscription::where('uuid', $subscriptions)->first();
        $plan = $subscription->plan;
        return view('subscriptionsmodule::client.subscriptions.payment',compact('plan','subscription'));
    }


    public function paymentSubscription(Request $request)
    {
        $data = $request->all();
        $subscription = Subscription::where('uuid', $data['subscriptionUuid'])->first();
        $plan = $subscription->plan;
        $this->mercadoPagoService->createSubscription($data,$plan,$subscription);
    }

    public function paused(Request $request)
    {
        $data = $request->all();
        $subscription = Subscription::where('uuid', $data['uuid'])->first();
        $plan = $subscription->plan;
        $mp = $this->mercadoPagoService->pausedSubscription($data,$plan,$subscription);


        if($mp){
            Alert::success('Mensaje existoso', 'Subscripcion Cancelada');
            return redirect()->route('client.subscriptions.index');
        }else{
            Alert::error('Error', 'Error al cancelar la subscripcion');
            return redirect()->route('client.subscriptions.index');
        }
    }

    public function paymentSuccess(Request $request)
    {
        Alert::success('Mensaje existoso', 'Subscripcion Creada');
        return redirect()->route('client.subscriptions.index');
    }

    public function paymentError(Request $request)
    {
        Alert::error('Error', 'Error al crear la subscripcion');
        return redirect()->route('client.subscriptions.index');
    }



    // public function createPayment(Request $request)
    // {
    //     $data = $request->all();
    //     // Configura tu Access Token (podrías configurarlo globalmente como hemos visto antes)
    //     $accessToken = Config::get('paymentmethodsmodule.payment_methods.mercadopago.access_token');
    //     SDK::setAccessToken($accessToken);

    //     $subscription = Subscription::where('uuid', $data['subscription_uuid'])->first(); // Asumiendo que tienes un modelo Subscription

    //     $item = new Item();
    //     $item->title = 'Pago de Suscripción';
    //     $item->quantity = 1;
    //     $item->unit_price = $subscription->price; // Asume que tu modelo de suscripción tiene un precio

    //     $preference = new Preference();

    //     // Configura URLs de redirección
    //     $preference->back_urls = [
    //         "success" => route('mp.success'), // URL a la que redirigir si el pago es exitoso
    //         "failure" => route('mp.failure'), // URL a la que redirigir si el pago falla
    //         "pending" => route('mp.pending') // URL a la que redirigir si el pago queda pendiente
    //     ];

    //     // Configura auto_return para que MercadoPago redirija automáticamente al usuario
    //     $preference->auto_return = "approved"; // Opciones: "approved" redirige solo para pagos aprobados; "all" para todos los estados

    //     // Configura el resto de tu preferencia de pago
    //     $preference->items = array($item);
    //     $preference->save();

    //     return $preference->init_point; // URL de checkout de MercadoPago
    // }



}
