<?php

namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

class SicknessManager
{
    public function getApi()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', "https://covid-api.mmediagroup.fr/v1/cases?continent=Europe");
        return $response->toArray();
    }

    public function getPrinciple()
    {
        $finalCountry = [];
        $principles = ["France", "Holy See", "Italy", "United Kingdom", "Germany", "Spain"];
        $countries = $this->getApi();
        foreach ($principles as $principle) {
            $finalCountry[] = $countries[$principle]['All'];
        }
        return $finalCountry;
    }
}
