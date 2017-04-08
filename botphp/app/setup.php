<?php
require_once("../vendor/autoload.php");

use Viber\Client;

$apiKey = '4598646108f1bcc7-43ec472796de914c-bf9cf2be56d45a4a'; // <- PLACE-YOU-API-KEY-HERE
$webhookUrl = 'https://www.thecovergame.com/botphp/app/bot.php'; // <- PLACE-YOU-HTTPS-URL
try {
    $client = new Client([ 'token' => $apiKey ]);
    $result = $client->setWebhook($webhookUrl);
    echo "Success!\n";
} catch (Exception $e) {
    echo "Error: ". $e->getMessage() ."\n";
}