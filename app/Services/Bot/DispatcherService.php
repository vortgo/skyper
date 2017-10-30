<?php

namespace App\Services\Bot\DispatcherService;


class DispatcherService {
    private $bot;
    private $text;
    private $callback;
    
    private $patterns = [
        '/совет/' => 'AdviseController@advice',
        '/отмаз|отмаз|ответ/' => 'DevAnswerController@answer',
    ];
    
    public function __construct($text, $bot)
    {
        $this->text = trim(str_replace(['@Skyper', '@(Skyper)'], '',$text));
        $this->bot = $bot;
    }
    
    public function call($callback = null)
    {
        foreach($this->patterns as $pattern => $call){
            if($this->match($pattern, $this->text)){
                $this->invoke($call);
                return;
            }
        }
        
        if($callback){
            call_user_func($callback, $this->bot);
        }
    }
    
    private function match($pattern, $text)
    {
        return preg_match($pattern, mb_strtolower($text));
    }
    
    private function invoke($call)
    {
        $data = explode('@',$call);
        $controller = app()->make('App\Http\Controllers\Bot\\'. $data[0]);
        app()->call([$controller, $data[1]], ['bot' => $this->bot]);
    }
    
    private function callback()
    {
        if($this->callback){
            call_user_func($callback, $this->bot);
        }
    }
    
}