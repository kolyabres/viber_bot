<?php namespace App;

class Client
{
    public static function getOrderInfo($number)
    {
        return "Follow this link https://www.17track.net/en/externalcall?resultDetailsH=156&nums={$number}&fc=0 to see you order status";
    }
}