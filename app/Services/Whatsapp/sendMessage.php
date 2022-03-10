<?php

namespace App\Services\Whatsapp;

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md

use Illuminate\Support\Facades\Http;
use Twilio\Rest\Client;

class sendMessage
{

    public function send($to)
    {

        require_once '../../vendor/autoload.php';

        config('services.twilio.sid');
        config('services.twilio.token');

        $sid    = "AC80768c1d84ec10c6cfdb09da74bff888";
        $token  = config('services.twilio.token');
        $twilio = new Client($sid, $token);
        $to;
        $message = $twilio->messages->create(
            "whatsapp:" . $to, // to
            array(
                "from" => "whatsapp:+14155238886",
                "body" => "لديك طلب جديد من متجر أطفالنا"
            )
        );

        print($message->sid);
    }

    public function nexmoSend($to){
        $url = "https://api.nexmo.com/v1/messages";
        /* $params = ["to" => ["type" => "whatsapp", "number" => $to],
        "from" => ["type" => "whatsapp", "number" => "972597428979"],
        "message" => [
            "content" => [
                "type" => "text",
                "text" => "Hello from Vonage and Laravel :) Please reply to this message with a number between 1 and 100"
            ]
        ]
    ]; */
    $params = [
        "from" => "972597428979",
        "to" => "$to",
        "message_type" => "text",
        "text" => "لديك طلب جديد من متجر أطفالنا ",
        "channel" => "whatsapp"
    ];
    $headers = ["Authorization" => "Basic " . base64_encode("81d72040:IwLUTYJUIU99OSTu")];

    //$client = new \GuzzleHttp\Client();
    //$response = $client->request('POST', $url, ["headers" => $headers, "json" => $params]);
    $response= Http::withHeaders($headers)->post($url,$params);
    $data = $response->getBody();
    return($response);
    //return view('thanks');
    }
}
