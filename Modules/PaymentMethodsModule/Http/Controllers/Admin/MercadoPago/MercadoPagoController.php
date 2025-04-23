<?php

namespace Modules\PaymentMethodsModule\Http\Controllers\Admin\MercadoPago;

use MercadoPago;
use Carbon\Carbon;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;


class MercadoPagoController extends Controller
{
    public function BackurlSuccess(Request $request)
    {
        dd($request);
    }

    public function Webhook()
    {
        MercadoPago\SDK::setAccessToken('TEST-3506705220175079-052815-4d55d4aec18aa77c244e76d40e654a71-766596078');
        $info = json_decode($this->input->raw_input_stream);

        if (isset($info->type)) {
            switch ($info->type) {
                case "plan":
                    $or_collection_id = $info->data->id;
                    $plan = MercadoPago\Plan . find_by_id($or_collection_id);
                    break;
                case "subscription":
                    $or_collection_id = $info->data->id;
                    $plan = MercadoPago\Subscription . find_by_id($or_collection_id);
                    break;
                default:
                    $this->output->set_status_header(200);
                    return;
                    break;
            }
        }
        $this->output->set_status_header(200);
        return;
    }

    //function preference
    public function preference(Request $request)
    {


        $description = $request->input('description');
        $quantity = $request->input('quantity');
        $price = $request->input('price');
        $user = $request->input('user'); // es el user Id
        $email = $request->input('email'); // es el email de ese userId

        // SDK de Mercado Pago
        require base_path('vendor/autoload.php');

        $accessToken = Config::get('paymentmethodsmodule.payment_methods.mercadopago.access_token');
        MercadoPago\SDK::setAccessToken($accessToken);
        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();

        // Define las URLs de redirección
        $redirection_urls = [
            'failure' => 'http://tally.com.ar/pay-result',
            'pending' => 'http://tally.com.ar/pay-result',
            'success' => 'http://tally.com.ar/pay-result',
        ];

        $preference->back_urls = $redirection_urls;
        $preference->auto_return = "approved";

        // metodos de pago
        $preference->payment_methods = array(
            "excluded_payment_methods" => array(), // No excluimos ningún método
            "excluded_payment_types" => array(
                array("id" => "ticket") // Excluimos el pago en efectivo o con tickets
            ),
            "installments" => 1 // Configuramos un solo pago
        );


        // Crea un ítem en la preferencia
        $item = new MercadoPago\Item();
        $item->title = $description;
        $item->quantity = $quantity;
        $item->unit_price = $price;
        $preference->items = array($item);

        //guardamos datos
        $preference->user = $user;
        $preference->email = $email;
        $preference->save();

        //guardamos todos los datos en payments
        $payment = new Payment();
        $payment->user_id = $user;
        $payment->description = $description;
        $payment->title = $description;
        $payment->quantity = $quantity;
        $payment->price = $price;
        $payment->email = $email;
        $payment->payment_preference_id = $preference->id;
        $payment->payment_preference_init_point = $preference->init_point;
        $payment->payment_date = Carbon::parse($preference->date_created)->format('Y-m-d');
        $payment->save();

        return response()->json($preference->toArray());
    }


    //function preference
    // public function PymentData(Request $request)
    // {

    //     $collectionStatus = $request->input('collection_status');
    //     $paymentType = $request->input('payment_type');
    //     $preferenceId = $request->input('preference_id');

    //    //buscamos en payment por preference_id
    //     $payment = Payment::where('payment_preference_id', $preferenceId)->first();

    //     if($request->input('collection_status') == 'approved' or $request->input('collection_status') == 'approved,approved'){
    //         $payment->payment_status = 'approved';
    //         $payment->payment_type = $paymentType;
    //         $payment->payment_date = date('Y-m-d');
    //         $payment->next_payment_date = date('Y-m-d', strtotime('+1 month'));
    //         $payment->save();
    //     }

    //     if($request->input('collection_status') == 'pending'){
    //         $payment->payment_status = 'pending';
    //         $payment->payment_type = $paymentType;
    //         // $payment->payment_date = date('Y-m-d');
    //         // $payment->next_payment_date = date('Y-m-d', strtotime('+1 month'));
    //         $payment->save();
    //     }

    //     return response()->json([
    //         'message' => 'Matias , Datos procesados exitosamente',
    //         'collection_status' => $collectionStatus,
    //         'payment_type' => $paymentType,
    //         'preference_id' => "matiassssssssssss",
    //     ]);
    // }

    public function test(Request $request)
    {

        $accessToken = Config::get('paymentmethodsmodule.payment_methods.mercadopago.access_token');
        MercadoPago\SDK::setAccessToken($accessToken);
         // Crea un objeto de preferencia
         $preference = new MercadoPago\Preference();
         dd($preference);
        $user = 22;
        $user = User::find($user);
        $payments = $user->payments->sortByDesc('created_at')->first();
        return response()->json($payments);
    }

    public function success(Request $request)
    {
        dd("success", $request);
    }

    public function failure(Request $request)
    {
        dd("failure",$request);
    }


    public function pending(Request $request)
    {
        dd("pending",$request);
    }

}
