<?php

namespace App\Console;

use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    protected $commands
        = [
            Commands\SendChatMessage::class,
        ];

    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->call(function () {
            $allUsers = User::all();

            if (count($allUsers) > 0) {
                foreach ($allUsers as $user) {
                    $name = $user->name;
                    $email = $user->email;
                    $data = [
                        "name" => $name,
                        "body" => "This is our new promotional offer"
                    ];
                    Mail::send(
                        'mailSchedule',
                        $data,
                        function ($message) use ($name, $email) {
                            $message->to($email, $name)->subject(
                                'New Offer Launched'
                            );
                        }
                    );
                }
            }
        })->everyFiveMinutes();
    }

    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}

