<?php

namespace App\Console\Commands\Skyper;

use App\Services\DevLifeService;
use App\Skyper\Attachments\Animation;
use App\Skyper\Drivers\SkyperDriver;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use Illuminate\Console\Command;

class DevLife extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'skyper:dev-life {chat}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Skyper Dev life';

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
        $devLifeService = new DevLifeService();
        list($description, $img) = $devLifeService->get();

        $attachment = new Animation($img);
        $attachment->setSubtitle($description);
        $message = OutgoingMessage::create()
            ->withAttachment($attachment);
        /** @var BotMan $bot */
        $bot = app('botman');
        $bot->say($message, $this->argument('chat'), SkyperDriver::class, ['serviceUrl' => 'https://smba.trafficmanager.net/apis/']);
    }
}
