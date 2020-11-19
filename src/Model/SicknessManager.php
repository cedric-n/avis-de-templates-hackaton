<?php

namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class SicknessManager
{
    public function getApi()
    {

        $client = HttpClient::create();
        $response = $client->request('GET', "https://covid-api.mmediagroup.fr/v1/cases?continent=Europe");
        $content = $response->toArray();
        return $content;
    }
}
