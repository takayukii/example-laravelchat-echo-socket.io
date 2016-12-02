<?php

namespace App\Console\Commands;

use App\Events\MessageCreateBroadcastEvent;
use App\Message;
use Illuminate\Console\Command;

class PushWebsocketNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'websocket:news {text}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $arguments = $this->argument();
        $text      = $arguments['text'];

        $message = Message::create([
            'text' => $text,
        ]);
        event(new MessageCreateBroadcastEvent($message));

        return true;
    }
}
