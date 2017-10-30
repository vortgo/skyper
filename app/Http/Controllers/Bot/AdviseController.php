<?php

namespace App\Http\Controllers\Bot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AdviseService;

class AdviseController extends Controller
{
  
    public function advice($bot)
    {
        $adviceService = new AdviseService();
        $advise = $adviceService->getByTag('кодеру');
        $bot->say($advise, $bot->getMessage()->getRecipient(), $bot->getDriver(),['serviceUrl' => 'https://smba.trafficmanager.net/apis/']);
    }

 
}
