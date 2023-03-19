<?php

namespace App\Console\Commands;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class SendChatMessage extends Command
{
    protected $signature = 'chat:message {message}';

    protected $description = 'Send chat message.';

    public function handle()
    {
        $user = User::first();
        $message = Message::create([
            'user_id' => $user->id,
            'message' => $this->argument('message')
        ]);

        event(new MessageSent($user, $message));
    }
}
