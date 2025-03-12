<?php
require_once('../vendor/autoload.php');

$client = new \GuzzleHttp\Client();

$response = $client->request('GET', 'https://api-mainnet.magiceden.dev/v2/marketplace/popular_collections', [
  'headers' => [
    'accept' => 'application/json',
  ],
]);

$body = $response->getBody();
$data = json_decode($body, true);

if (isset($data['data']) && is_array($data['data'])) {
  // Stockez les données dans une variable
  $resultats = $data['data'];

  // Limitez les résultats aux 5 premiers éléments
  $resultatsLimites = array_slice($resultats, 0, 5);

  // Répondez avec les résultats limités
  $limitedResponse = [
    'data' => $resultatsLimites,
  ];

  echo json_encode($limitedResponse);
} else {
  echo $body;
}