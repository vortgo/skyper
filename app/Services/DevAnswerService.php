<?php 

namespace App\Services;

class DevAnswerService {
    
    private $url = 'http://devanswers.ru/';
    
    private $prefix = [
        'Смело говори: ',
        'Попробуй ответить: ',
        'Ответь: '
    ];
    
    public function get()
    {
        $rawHtml = file_get_contents($this->url);
        preg_match('|{"text"(.*?)}|sei', $rawHtml, $arr);
        return $this->prefix[rand(0,2)] . json_decode($arr[0])->text;
    }
    
}