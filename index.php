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
            ->setText("Can i help you?");
    })
    ->onText('|whois .*|si', function ($event) use ($bot, $botSender) {
        // это событие будет вызвано если пользователь пошлет сообщение
        // которое совпадет с регулярным выражением
        $bot->getClient()->sendMessage(
            (new \Viber\Api\Message\Text())
                ->setSender($botSender)
                ->setReceiver($event->getSender()->getId())
                ->setText("I do not know )")
        );
    })
    ->run();


try {

} catch (Exception $e) {

}