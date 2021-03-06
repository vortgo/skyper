<?php

namespace App\Console\Commands\Skyper;

use App\Skyper\Attachments\Animation;
use App\Skyper\Drivers\SkyperDriver;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use Illuminate\Console\Command;
use App\Services\AdviseService;
use BotMan\BotMan\Messages\Outgoing\Question;
use  BotMan\BotMan\Messages\Outgoing\Actions\Button;

class Message extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'skyper:message {chat} {message?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send message to chat';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $attachment = new Animation('http://image-url-here.jpg');

        // Build message object
        $message = OutgoingMessage::create()
            ->withAttachment($attachment);
        /** @var BotMan $bot */
        $bot = app('botman');
        $bot->say($message, $this->argument('chat'), SkyperDriver::class, ['serviceUrl' => 'https://smba.trafficmanager.net/apis/']);
    }
}
