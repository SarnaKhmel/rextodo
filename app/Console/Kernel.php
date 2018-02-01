<?php

namespace App\Console;

use App\Task;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\DeleteInActiveUsers::class,
        Commands\SendMails::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //$schedule->command(Commands\DeleteInActiveUsers::class)
          //          ->everyMinute();
        //$schedule->command(Commands\SendMails::class)
          //          ->cron('* * * * *');

        $schedule->call(function (){
            foreach (Task::all()->where('time','=', Carbon::tomorrow()->toDateString()) as $title){
                $to = $title->user()->value('email_us');
                Mail::send('mails.reminderMail',['title' => $title->title], function ($message) use ($to)
                {
                    $message->from('AdminOlsa@example.com');
                    $message->to($to);
                });
            }

        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
