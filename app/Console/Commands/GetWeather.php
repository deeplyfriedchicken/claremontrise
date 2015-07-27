<?php

namespace App\Console\Commands;
use Forecast\Forecast;
use Carbon\Carbon;
use App\Weather;
use DB;
use App;

use Illuminate\Console\Command;

class GetWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

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
      $key = env('FORECAST_IO_API_KEY');
      $forecast = new Forecast($key);
      $weather = $forecast->get('34.101655','-117.707591');
      for ($i = 0; $i < 7; $i++) {

        if($i == 0) {
          $current = $weather->currently->temperature;
        }
        else {
          $current = -1;
        }
        echo $i;
        $date = Carbon::createFromTimeStamp($weather->daily->data[$i]->time)->toDateTimeString();
        $dateId = substr($date, 0, 10);
        $id = DB::table('email_articles')->where('post_date', $dateId)->value('article_id');
        $icon = $weather->daily->data[$i]->icon;
        if (strpos($icon,'night') !== false) {
          $icon = 'clear-day';
        }
        $max = $weather->daily->data[$i]->temperatureMax;
        $min = $weather->daily->data[$i]->temperatureMin;
        $sunset = Carbon::createFromTimeStamp($weather->daily->data[$i]->sunsetTime)->toDateTimeString();
        $sunrise =  Carbon::createFromTimeStamp($weather->daily->data[$i]->sunriseTime)->toDateTimeString();

        if (Weather::where('article_id', '=', $id)->exists()) {
          DB::table('weather')
            ->where('article_id', $id)
            ->update(array('icon' => $icon, 'current_temp' => $current, 'max' => $max, 'min' => $min, 'sunriseTime' => $sunrise, 'sunsetTime' => $sunset, 'updated_at' => Carbon::now()));
          echo "Updated ".$date;
        }
        else {
          $entry = new Weather;
          $entry->article_id = $id;
          $entry->icon = $icon;
          $entry->current_temp = $current;
          $entry->max = $max;
          $entry->min = $min;
          $entry->sunsetTime = $sunset;
          $entry->sunriseTime = $sunrise;
          $entry->save();
          echo "Stored ".$date."!";
        }
      }
    }
}
