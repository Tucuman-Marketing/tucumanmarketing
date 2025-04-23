<?php


namespace Modules\SubscriptionsModule\Http\Controllers\Admin;

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

class AdminSubscriptionPaysController extends AdminBaseController
{


    protected $mercadoPagoService;

    public function __construct(MercadoPagoService $mercadoPagoService)
    {
        parent::__construct();
        $this->mercadoPagoService = $mercadoPagoService;
    }

    public function payment(Request $request,Subscription $subscriptions)
    {
        $subscription = $subscriptions;
        $plan = $subscriptions->plan;
        return view('subscriptionsmodule::admin.subscriptions.payment',compact('plan','subscription'));
    }


    public function paymentSubscription(Request $request)
    {
        $data = $request->all();

        //BUSCAMOS EL PLAN Y LA SUSCRIPCION
        $subscription = Subscription::where('uuid', $data['subscriptionUuid'])->first();
        $plan = SubscriptionPlan::where('uuid', $data['planUuid'])->first();

        $mp = $this->mercadoPagoService->createSubscription($data,$plan,$subscription);

        if($mp){
            Alert::success('Mensaje existoso', 'Subscripcion Creada');
        }else{
            Alert::error('Error', 'Error al crear la subscripcion');
        }

        return redirect()->route('admin.subscriptions.index');
    }


    public function paused(Request $request)
    {
        $data = $request->all();
        $subscription = Subscription::where('uuid', $data['uuid'])->first();
        $plan = $subscription->plan;
        $mp = $this->mercadoPagoService->pausedSubscription($data,$plan,$subscription);

        if($mp){
            Alert::success('Mensaje existoso', 'Subscripcion Cancelada');
            return redirect()->route('admin.subscriptions.index');
        }else{
            Alert::error('Error', 'Error al cancelar la subscripcion');
            return redirect()->route('admin.subscriptions.index');
        }
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






    //buscar en suscripciones
    public function searchPlan(){
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer TEST-4599*********755-11221*********d497ae962*********ecf8d85-1*********',
        ])->get('https://api.mercadopago.com/preapproval_plan/search');

        // Verificar la respuesta
        if ($response->successful()) {
            // La solicitud fue exitosa
            $responseData = $response->json();
        } else {
            // Hubo un error con la solicitud
            Log::error('Error al buscar el plan de preaprobación: ' . $response->body());
        }
    }

    //obtenr suscripcion
    public function getSubscription(){
        $response = Http::withHeaders([
            'Content-Type' => 'application',
            'Authorization' => 'Bearer TEST-4599*********755-11221*********d497ae962*********ecf8d85-1*********',
        ])->get('https://api.mercadopago.com/preapproval/2c938084726fca480172750000000000');

        // Verificar la respuesta
        if ($response->successful()) {
            // La solicitud fue exitosa
            $responseData = $response->json();
        } else {
            // Hubo un error con la solicitud
            Log::error('Error al obtener el plan de preaprobación: ' . $response->body());
        }
    }

    //obtener id del usuario
    public function getUserId()
    {
        $accessToken = Config::get('paymentmethodsmodule.payment_methods.mercadopago.access_token');
        SDK::setAccessToken($accessToken);

        $client = new Client();

        $response = $client->request('GET', 'https://api.mercadopago.com/users/me', [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
            ],
        ]);

        $body = $response->getBody();
        $content = $body->getContents();

        $user = json_decode($content);

        echo 'Country: ' . $user->site_id;


        $client = new Client();

    }

    //Obtener información de facturas
    public function getInvoiceInfo()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application',
            'Authorization' => 'Bearer TEST-202********7685-122********4ceb4307********cded732e********115498',
        ])->get('https://api.mercadopago.com/authorized_payments/3950169598');

        // Verificar la respuesta
        if ($response->successful()) {
            // La solicitud fue exitosa
            $responseData = $response->json();
        } else {
            // Hubo un error con la solicitud
            Log::error('Error al obtener el pago autorizado: ' . $response->body());
        }
    }

    //buscar todas las facturas
    public function searchInvoices()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer TEST-202********7685-122********4ceb4307********cded732e********115498',
        ])->get('https://api.mercadopago.com/authorized_payments/search');

        // Verificar la respuesta
        if ($response->successful()) {
            // La solicitud fue exitosa
            $responseData = $response->json();
        } else {
            // Hubo un error con la solicitud
            Log::error('Error al buscar los pagos autorizados: ' . $response->body());
        }

    }

    //finished
    public function finished(Request $request)
    {
        Log::info($request);
        return "ok";
    }
}
