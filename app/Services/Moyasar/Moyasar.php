<?php
 namespace App\Services\Moyasar;

use Illuminate\Support\Facades\Http;

 class Moyasar{

    public function fetch($id){

       $response = Http::baseUrl('https://api.moyasar.com/v1/')->withBasicAuth('sk_test_bCcTPA497oFPZyCudBU8Ufc7Tf9khhGfCkiNg3mk','')->get("payments/$id")->json();

       return $response;
    }
    public function capture($id){

       $response = Http::baseUrl('https://api.moyasar.com/v1/')->withBasicAuth('sk_test_bCcTPA497oFPZyCudBU8Ufc7Tf9khhGfCkiNg3mk','')->post("payments/$id/capture")->json();

       return $response;
    }
 }
