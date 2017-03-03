<?php
require_once("vendor/autoload.php");

use Viber\Client;
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

try {
    $client = new Client([ 'token' => getenv('API_KEY') ]);
    $result = $client->setWebhook(getenv('BOT_URL'));
    echo "Success!\n";
} catch (Exception $e) {
    echo "Error: ". $e->getError() ."\n";
}