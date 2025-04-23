<?php

namespace Modules\WebContent\Traits;

use GuzzleHttp\Client;

trait RecaptchaTrait
{
    public function verifyRecaptcha($request)
    {
        $result = [
            'success' => null,
            'score' => null,
            'is_spam' => false,
        ];

        if(config('app.recaptcha')){
            $recaptchaResponse = $request->input('g-recaptcha-response');
            $client = new Client();
            $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
                'form_params' => [
                    'secret'   => config('app.recaptcha_secret_key'),
                    'response' => $recaptchaResponse,
                    'remoteip' => $_SERVER['REMOTE_ADDR'],
                ],
            ]);
            $responseData = json_decode($response->getBody());
            $result['success'] = $responseData->success;
            if ($result['success']) {
                $result['score'] = $responseData->score;

                // Define un umbral para el score, por ejemplo, 0.5
                $threshold = 0.5;
                if ($result['score'] >= $threshold) {
                    $result['is_spam'] = false;
                } else {
                    $result['is_spam'] = true;
                }
            } else {
                // Manejar el caso en que la verificación de reCAPTCHA falla
                $result['is_spam'] = true;
            }
        } else {
            $result['success'] = true;
            $result['score'] = 1.0;
            $result['is_spam'] = false;
        }

        return $result;
    }
}
