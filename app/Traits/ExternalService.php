<?php

namespace App\Traits;
use GuzzleHttp\Client;

trait ExternalService
{

    public function performRequest($params)
    {
        $params = [
            'method' => !empty($params['method']) ? $params['method'] : 'GET',
            'request_url' => !empty($params['request_url']) ? $params['request_url'] : 'GET',
            'form_data' => !empty($params['form_data']) ? $params['form_data'] : [],
            'headers' => !empty($params['headers']) ? $params['headers'] : [],
        ];

        // dd($params);
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

        $response = $client
            ->request(
                $params['method'],
                $params['request_url'],
                [
                    'form_params' => $params['form_data'],
                    'headers' => $params['headers']
                ]
            );

        return json_decode($response->getBody()->getContents());
    }
}
