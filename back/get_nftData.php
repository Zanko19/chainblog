<?php
require_once('../vendor/autoload.php');

function fetchPopularCollections() {
    $client = new \GuzzleHttp\Client();
    try {
        $response = $client->request('GET', 'https://api-mainnet.magiceden.dev/v2/marketplace/popular_collections', [
            'headers' => [
                'accept' => 'application/json',
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        return $data;
    } catch (\GuzzleHttp\Exception\RequestException $e) {
        // Gérer l'exception ici
        return 'Error fetching data: ' . $e->getMessage();
    }
}
