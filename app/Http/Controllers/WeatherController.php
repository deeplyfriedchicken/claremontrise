<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Forecast\Forecast;
use Carbon\Carbon;
use App\Weather;
use App\Icons;
use DB;
use App;

use App\Http\Requests;
use App\Http\Controllers\Controller;
require 'ScraperController.php';

class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getWeather() {
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
        echo strpos($icon, 'night');
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

    public function index() {

    }

    public function weatherIcons()
    {
        $icon = new Icons;
        $icon->name = 'clear-day';
        $icon->imgUrl = 'https://dl.dropboxusercontent.com/u/48479368/weather/clear-day.png';
        $icon->save();
        echo "Stored!";

        $icon = new Icons;
        $icon->name = 'cloudy';
        $icon->imgUrl = 'https://dl.dropboxusercontent.com/u/48479368/weather/cloudy.png';
        $icon->save();
        echo "Stored!";

        $icon = new Icons;
        $icon->name = 'fog';
        $icon->imgUrl = 'https://dl.dropboxusercontent.com/u/48479368/weather/fog.png';
        $icon->save();
        echo "Stored!";

        $icon = new Icons;
        $icon->name = 'partly-cloudy-day';
        $icon->imgUrl = 'https://dl.dropboxusercontent.com/u/48479368/weather/partly-cloudy.png';
        $icon->save();
        echo "Stored!";

        $icon = new Icons;
        $icon->name = 'rain';
        $icon->imgUrl = 'https://dl.dropboxusercontent.com/u/48479368/weather/rain.png';
        $icon->save();
        echo "Stored!";

        $icon = new Icons;
        $icon->name = 'wind';
        $icon->imgUrl = 'https://dl.dropboxusercontent.com/u/48479368/weather/windy.png';
        $icon->save();
        echo "Stored!";

        $icon = new Icons;
        $icon->name = 'compass';
        $icon->imgUrl = 'https://dl.dropboxusercontent.com/u/48479368/weather/compass.png';
        $icon->save();
        echo "Stored!";

        $icon = new Icons;
        $icon->name = 'N/A';
        $icon->imgUrl = 'https://dl.dropboxusercontent.com/u/48479368/weather/N%3AA.png';
        $icon->save();
        echo "Stored!";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
