<?php
require_once("vendor/autoload.php");

use Viber\Bot;
use Viber\Api\Sender;

$botSender = new Sender([
    'name' => 'Packer',
]);

$bot = new Bot(['token' => getenv('API_KEY')]);

$bot->onConversation(function ($event) use ($bot, $botSender) {
    return (new \Viber\Api\Message\Text())
        ->setSender($botSender)
        ->setText("Enter your tracking number");
})->onText('/.*/', function ($event) use ($bot, $botSender) {
    $number = $event->getMessage()->getText();
    $text = \App\Client::getOrderInfo($number);
    $message = (new \Viber\Api\Message\Text())
        ->setSender($botSender)
        ->setReceiver($event->getSender()->getId())
        ->setText($text);

    $bot->getClient()->sendMessage($message);

})->run();