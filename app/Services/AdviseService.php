<?php 

namespace App\Services;

class AdviseService {
    
    private $url = 'http://fucking-great-advice.ru/api';
    
    public function getByTag($tag)
    {
        $advice = file_get_contents($this->url . "/random_by_tag/$tag");
        $data = json_decode($advice);
        return str_replace('&nbsp;', ' ', $data->text);
    }
    
}