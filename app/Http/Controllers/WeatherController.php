<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Forecast\Forecast;
use Carbon\Carbon;
use App\Weather;
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
        echo $i;
        $date = Carbon::createFromTimeStamp($weather->daily->data[$i]->time)->toDateTimeString();
        $dateId = substr($date, 0, 10);
        $id = DB::table('email_articles')->where('post_date', $dateId)->value('article_id');
        $icon = $weather->daily->data[$i]->icon;
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

    public function index()
    {
        //
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
