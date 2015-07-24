<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Inspire::class,
        \App\Console\Commands\ScrapeCMC::class,
        \App\Console\Commands\ScrapeAthSpeakers::class,
        \App\Console\Commands\ScrapeAthFood::class,
        \App\Console\Commands\ScrapeSports::class,
        \App\Console\Commands\ScrapePosts::class,
        \App\Console\Commands\GetWeather::class,
        \App\Console\Commands\CreateArticles::class
    ];
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
                 ->hourly();
        $schedule->command('cmc:scrape')
                  ->dailyAt('20:10');
        $schedule->command('sports:scrape')
                  ->dailyAt('20:00');
        $schedule->command('athspeakers:scrape')
                  ->dailyAt('20:20');
        $schedule->command('posts:scrape')
                  ->dailyAt('20:30');
        $schedule->command('weather:get')
                  ->hourly();
        $schedule->command('athfood:scrape')
                  ->dailyAt('20:40');
    }
}
