<?php
/**
 * Created by PhpStorm.
 * User: vortgo
 * Date: 30.10.17
 * Time: 15:37
 */

namespace App\Skyper\Attachments;


use BotMan\BotMan\Messages\Attachments\Attachment;

class Animation extends Attachment
{
    /** @var string */
    protected $url;

    /** @var string */
    protected $title;

    /** @var  string */
    protected $subtitle;

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Animation
     */
    public function setUrl(string $url): Animation
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Animation
     */
    public function setTitle(string $title): Animation
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param string $subtitle
     * @return Animation
     */
    public function setSubtitle(string $subtitle): Animation
    {
        $this->subtitle = $subtitle;
        return $this;
    }

    public function __construct($url, $payload = null)
    {
        parent::__construct($payload);
        $this->url = $url;
    }

    /**
     * Get the instance as a web accessible array.
     * This will be used within the WebDriver.
     *
     * @return array
     */
    public function toWebDriver()
    {
        return [
            'type' => 'image',
            'url' => $this->url,
            'title' => $this->title,
        ];
    }
}
