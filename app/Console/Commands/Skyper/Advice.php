<?php

namespace App\Console\Commands\Skyper;

use Illuminate\Console\Command;
use App\Services\AdviseService;

class Advice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'skyper:advice {chat}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send advice to chat';

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
        $adviceService = new AdviseService();
        $advise = $adviceService->getByTag('кодеру');
        
        $bot = app('botman');
        $bot->say($advise, $this->argument('chat'), \BotMan\Drivers\BotFramework\BotFrameworkDriver::class,['serviceUrl' => 'https://smba.trafficmanager.net/apis/']);
    }
}
