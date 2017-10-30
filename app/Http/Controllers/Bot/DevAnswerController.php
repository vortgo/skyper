<?php

namespace App\Http\Controllers\Bot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\DevAnswerService;

class DevAnswerController extends Controller
{
  
    public function answer($bot)
    {
        $answerService = new DevAnswerService();
        $answer = $answerService->get();
        $bot->say($answer, $bot->getMessage()->getRecipient(), $bot->getDriver(),['serviceUrl' => 'https://smba.trafficmanager.net/apis/']);
    }

 
}
