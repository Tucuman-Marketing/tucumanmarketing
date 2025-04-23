<?php

namespace Modules\SubscriptionsModule\Http\Services\Admin\MercadoPago;
use Modules\SubscriptionsModule\Entities\SubscriptionPlan;
use Modules\SubscriptionsModule\Entities\Subscription;

// LIBS
use Illuminate\Http\Request;
Use Alert;
use Illuminate\Support\Facades\Config;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class MercadoPagoService
{
    protected function getAccessToken()
    {
        return Config::get('paymentmethodsmodule.payment_methods.mercadopago.access_token');
    }

    public function createPlan($plan, $request)
    {
        $url = "https://api.mercadopago.com/preapproval_plan";
        $requestData = [
            "auto_recurring" => [
                "frequency" => $plan->frequency,
                "frequency_type" => $plan->frequency_type,
                //"repetitions" => 12,
                "billing_day" => $plan->billing_day,
                "billing_day_proportional" => false,
                "transaction_amount" => $plan->price,
                "currency_id" => "ARS"
            ],
            "back_url" => "https://www.yoursite.com",
            "payment_methods_allowed" => [
                "payment_types" => [
                    [
                        "id" => "credit_card"
                    ]
                ],
                "payment_methods" => [
                    [
                        "id" => "bolbradesco"
                    ]
                ]
            ],
            "reason" => $plan->description ? $plan->description : $plan->name,
        ];

        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.$this->getAccessToken()
            ];

        $response = Http::withHeaders($headers)->post($url, $requestData);

        $plan->request = json_encode($requestData);
        $plan->response = json_encode($response->json());
        $plan->save();

        Log::channel('mercadopago')->info($response->json());

        // Verificar la respuesta
        if ($response->successful()) {
            $responseData = $response->json();
            Log::channel('mercadopago')->info('Plan creado con éxito: ' . json_encode($responseData));
            $plan->mp_planId = $responseData['id'];
            $plan->save();
        } else {
            Log::channel('mercadopago')->error('Error al crear el plan de preaprobación: ' . $response->body());
            $plan->response_error = true;
            $plan->save();
        }
    }

    public function editPlan($plan)
    {
        $url = "https://api.mercadopago.com/preapproval_plan/" . $plan->mp_planId;
        $requestData = [
            "auto_recurring" => [
                "frequency" => $plan->frequency,
                "frequency_type" => $plan->frequency_type,
                //"repetitions" => 12,
                "billing_day" => $plan->billing_day,
                "billing_day_proportional" => false,
                // "free_trial" => [
                //     "frequency" => 1,
                //     "frequency_type" => "months"
                // ],
                "transaction_amount" => $plan->price,
                "currency_id" => "ARS"
            ],
            "back_url" => "https://www.yoursite.com",
            "payment_methods_allowed" => [
                "payment_types" => [
                    [
                        "id" => "credit_card"
                    ]
                ],
                "payment_methods" => [
                    [
                        "id" => "bolbradesco"
                    ]
                ]
            ],
            "reason" => $plan->description ? $plan->description : $plan->name,
        ];

        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.$this->getAccessToken()
            ];

        $response = Http::withHeaders($headers)->put($url, $requestData);

        $plan->request = json_encode($requestData);
        $plan->response = json_encode($response->json());
        $plan->save();

        Log::channel('mercadopago')->info($response->json());

        if ($response->successful()) {
            $responseData = $response->json();
            Log::channel('mercadopago')->info('Plan editado con éxito: ' . json_encode($responseData));
            $plan->mp_planId = $responseData['id'];
        } else {
            Log::channel('mercadopago')->error('Error al editar el plan: ' . $response->body());
        }
    }

    public function createSubscription($data,$plan,$subscription)
    {

        $url = "https://api.mercadopago.com/preapproval";
        $requestData = [
        "auto_recurring" => [
            "frequency" => $plan->frequency,
            "frequency_type" => $plan->frequency_type,
            //start_date fecha de hoy 2024-02-22T13:07:14.260Z
            "start_date" => $this->getISO8601date(date("Y-m-d H:i:s")),
           //end_date sumimos 1 mes
            "end_date" => $this->getISO8601date(date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " + 1 month"))),
            "transaction_amount" => $plan->price,
            "currency_id" => "ARS"
        ],
        "back_url" => "https://ner-dos.net/lavacar/",
        "card_token_id" => $data['token'], // Reemplaza esto con el token de la tarjeta que obtuviste
        "external_reference" => $subscription->uuid,
        "payer_email" => $data['payer']['email'], // Reemplaza esto con el correo electrónico del pagador
        "payer_identification" => $data['payer']['identification']['number'], // Agrega esto para enviar el DNI del pagador
        "payer_type" => $data['payer']['identification']['type'], // Agrega esto para enviar el DNI del pagador
        "reason" => $plan->description ? $plan->description : $plan->name,
        "preapproval_plan_id" => $plan->mp_planId,
        "status" => "authorized"
        ];

        $headers = [
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer '.$this->getAccessToken()
        ];

        //guardamos el request
        $subscription->request = json_encode($requestData);
        $subscription->save();

        $response = Http::withHeaders($headers)->post($url, $requestData);
        Log::channel('mercadopago')->info($response->json());

        if ($response->successful()) {
            $responseData = $response->json();
            Log::channel('mercadopago')->info('Suscripción creada con éxito: ' . json_encode($responseData));
            $subscription->response = json_encode($response->json());
            $subscription->mp_SubscriptionId = $responseData['id'];
            if($responseData['status'] == "authorized"){
                $subscription->status = "Pagado";
            }
            $subscription->save();
            return true;

        }else{
            $subscription->response = json_encode($response->json());
            $subscription->response_error = true;
            $subscription->save();
            Log::channel('mercadopago')->error('Error al crear la suscripción: ' . $response->body());
            return false;
        }


    }

    public function pausedSubscription($data,$plan,$subscription)
    {
        $url = "https://api.mercadopago.com/preapproval/" . $subscription->mp_subscriptionId;
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.$this->getAccessToken()
        ];
        $requestData = [
        "auto_recurring" => [
             "transaction_amount" => $plan->price,
            "currency_id" => "ARS"
        ],
        "back_url" => "https://ner-dos.net/lavacar/",
        "external_reference" => $subscription->uuid,
        "reason" => $plan->description ? $plan->description : $plan->name,
        "status" => "paused"
        ];

        $response = Http::withHeaders($headers)->put($url, $requestData);
        Log::channel('mercadopago')->info($response->json());

        if ($response->successful()) {
            $responseData = $response->json();
            Log::channel('mercadopago')->info('Suscripción pausada con éxito: ' . json_encode($responseData));
            $subscription->status = "Cancelado";
            $subscription->response = json_encode($response->json());
            $subscription->save();
            return true;
        } else {
            Log::channel('mercadopago')->error('Error al pausada la suscripción: ' . $response->body());
            $subscription->response = json_encode($response->json());
            $subscription->response_error = true;
            $subscription->save();
            return false;
        }
    }

    protected function getISO8601date($date) {
        $time = microtime(true);
        $microSeconds = sprintf("%04d", ($time - floor($time)) * 1000000);
        $dt = Carbon::createFromFormat('Y-m-d H:i:s.u', date('Y-m-d H:i:s.'. $microSeconds, strtotime(date($date) ) ));

        $iso8601Date = sprintf(
            "%s%03dZ",
            $dt->format("Y-m-d\TH:i:s."),
            floor($dt->format("u")/1000)
        );

        return $iso8601Date;
    }
}



