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
        \App\Console\Commands\CreateArticles::class,
        \App\Console\Commands\GetBuzzFeed::class,
        \App\Console\Commands\ScrapeMenus::class,
        \App\Console\Commands\GetGifs::class
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
                  ->dailyAt('00:10');
        $schedule->command('sports:scrape')
                  ->dailyAt('00:00');
        $schedule->command('athspeakers:scrape')
                  ->dailyAt('00:20');
        $schedule->command('posts:scrape')
                  ->dailyAt('00:30');
        $schedule->command('weather:get')
                  ->cron('* 7,16 * * *');
        $schedule->command('athfood:scrape')
                  ->dailyAt('00:40');
        $schedule->command('buzzfeed:get')
                  ->dailyAt('06:00');
        $schedule->command('menu:scrape')
                  ->dailyAt('05:00');
        $schedule->command('gif:get')
                  ->dailyAt('12:00');
    }
}
