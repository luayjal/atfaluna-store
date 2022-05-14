<?php

namespace App\Services\MalathSms;

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md

use Illuminate\Support\Facades\Http;
use Twilio\Rest\Client;

class sendMessage
{

    public function sendSms($mobile , $message)
    {
      $username =   config('malath-sms.malath_sms_username');
       $password = config('malath-sms.malath_sms_password');


     $response =  Http::get("https://sms.malath.net.sa/httpSmsProvider.aspx",[
        'username'=> $username,
        'password'=> $password,
        'mobile'=> "966591198559",
        'unicode'=>'none',
        'message'=> $message,
        'sender'=> "atfaluna",
       ]);

       return json_decode($response);
    }


}
