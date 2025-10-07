<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Events\MessageSent;

class SendMessage extends Command
{
    protected $signature = 'send:message';

    protected $description = 'This command allow you to send a message to a user in websocket';

    public function handle()
    {
        // $message = $this->ask('Please enter the message');
        // $email = $this->ask('Please enter the email');

        // broadcast(new MessageSent($message, $email));
    }
}
