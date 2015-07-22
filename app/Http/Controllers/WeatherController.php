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

      $now = Carbon::now();
      $date = substr($now, 0, 10);
      $id = DB::table('email_articles')->where('post_date', $date)->value('article_id');
      // Get the current forecast for a given latitude and longitude
      $weather = $forecast->get('34.101655','-117.707591');
      $current = $weather->currently->temperature;
      $max = $weather->daily->data[0]->temperatureMax;
      $min = $weather->daily->data[0]->temperatureMin;
      $icon = $weather->daily->data[0]->icon;

      if (Weather::where('article_id', '=', $id)->exists()) {
        echo "weather for ".$date." already exists";
      }
      else {
        $entry = new Weather;
        $entry->article_id = $id;
        $entry->icon = $icon;
        $entry->current_temp = $current;
        $entry->max = $max;
        $entry->min = $min;
        $entry->save();
        echo "Stored ".$date."!";
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
