<?php
 namespace App\Services\Moyasar;

use Illuminate\Support\Facades\Http;

 class Moyasar{



    public function fetch($id){

       $response = Http::baseUrl('https://api.moyasar.com/v1/')->withBasicAuth(config("moyasar.secret_api_key"),'')->get("payments/$id")->json();

       return $response;
    }
    public function capture($id){

       $response = Http::baseUrl('https://api.moyasar.com/v1/')->withBasicAuth(config("moyasar.secret_api_key"),'')->post("payments/$id/capture")->json();

       return $response;
    }
 }
