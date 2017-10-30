<?php

$botman = resolve('botman');


$botman->fallback(function($bot) {
    $text = $bot->getMessage()->getText();
    $dispatcher = new \App\Services\Bot\DispatcherService\DispatcherService($text, $bot);
    $dispatcher->call( function ($bot) {
      //    $bot->say("Id: ". $bot->getMessage()->getRecipient(), $bot->getMessage()->getRecipient(), $bot->getDriver(),['serviceUrl' => 'https://smba.trafficmanager.net/apis/']);
    });
});