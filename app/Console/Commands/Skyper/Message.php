<?php

namespace App\Console\Commands\Skyper;

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
        $question = Question::create('Привет ребята! Как дела?')
            ->fallback('Unable to create a new database')
            ->addButtons([
                Button::create('Я сегодня рок звезда')->value('Я соврал, все как обычно!'),
                Button::create('Мне некогда отвечать роботу, умри железяка!!')->value('Проти меня, о великий Бог будущего мира.'),
                Button::create('Я впорядке')->value('Спасибо зарядке'),
        ]);
        
        $bot = app('botman');
        $bot->say($question, $this->argument('chat'), \BotMan\Drivers\BotFramework\BotFrameworkDriver::class, ['serviceUrl' => 'https://smba.trafficmanager.net/apis/']);
    }
}
