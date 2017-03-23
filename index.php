<?php
require_once("vendor/autoload.php");

use Viber\Bot;
use Viber\Api\Sender;

$botSender = new Sender([
    'name' => 'Whois bot',
]);

$bot = new Bot(['token' => getenv('API_KEY')]);

$bot
    ->onConversation(function ($event) use ($bot, $botSender) {
        return (new \Viber\Api\Message\Text())
            ->setSender($botSender)
            ->setText("Enter your tracking number");
    })
    ->onText('/.*/', function ($event) use ($bot, $botSender) {
        $message = $event->getMessage()->getText();
        $bot->getClient()->sendMessage(
            (new \Viber\Api\Message\Text())
                ->setSender($botSender)
                ->setReceiver($event->getSender()->getId())
                ->setText("Follow this link https://www.17track.net/en/externalcall?resultDetailsH=156&nums={$message}&fc=0 to see you order status")
        );
    })
    ->run();


try {

} catch (Exception $e) {

}