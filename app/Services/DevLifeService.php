<?php

namespace App\Services;

class DevLifeService
{

    private $url = 'https://developerslife.ru/random';

    public function get()
    {
        $html = $this->getHtmlCode();
        preg_match('|desc</span>:<span class=\"value\">\'(.*?)\'</span>|sei', $html, $arr);
        $description = $arr[1];

        preg_match('|<backup_img src="//(.*?)" />|sei', $html, $arr);
        $img = 'http://'. $arr[1];

        return [$description, $img];
    }

    public function getHtmlCode()
    {

        $curl = curl_init($this->url);
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
        ]);

        $content = curl_exec($curl);

        curl_close($curl);
        return $content;
    }

}
