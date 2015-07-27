<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FoodHours;
use Carbon\Carbon;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FoodHoursController extends Controller
{
    public function addHours() {
      $name = 'Hub Grill';
      if (FoodHours::where('name', '=', $name)->exists()) {
        echo $name." already exists";
      }
      else {
        DB::table('food_hours')->insert(
        ['name' => 'Hub Grill', 'type' => 'store',
        '1_morning_hours' => 'Closed',
        '1_afternoon_hours' => '11:00AM - 3:00PM',
        '1_night_hours' => '7:00PM - 10:30PM',
        '2_morning_hours' => 'Closed',
        '2_afternoon_hours' => '11:00AM - 3:00PM',
        '2_night_hours' => '7:00PM - 10:30PM',
        '3_morning_hours' => 'Closed',
        '3_afternoon_hours' => '11:00AM - 3:00PM',
        '3_night_hours' => '7:00PM - 10:30PM',
        '4_morning_hours' => 'Closed',
        '4_afternoon_hours' => '11:00AM - 3:00PM',
        '4_night_hours' => '7:00PM - 10:30PM',
        '5_morning_hours' => '7:00AM - 3:00PM',
        '5_night_hours' => '7:00PM - 2:00AM',
        '6_night_hours' => '7:00PM - 2:00AM',
        '7_night_hours' => '7:00PM - 12:00AM',
        'updated_at' => Carbon::now(), 'created_at' => Carbon::now()]
        );
        echo "Hours saved for ".$name;
      }
      echo $name;
      $name = 'Hub Store';
      echo $name;
      if (FoodHours::where('name', '=', $name)->exists()) {
        echo $name." already exists";
      }
      else {
        DB::table('food_hours')->insert(
        ['name' => $name, 'type' => 'store',
        '1_morning_hours' => 'All', //if this exists, don't show closed
        '1_afternoon_hours' => '10:00AM - 11:00PM',
        '1_night_hours' => 'All',
        '2_morning_hours' => 'All',
        '2_afternoon_hours' => '10:00AM - 11:00PM',
        '2_night_hours' => 'All',
        '3_morning_hours' => 'All',
        '3_afternoon_hours' => '10:00AM - 11:00PM',
        '3_night_hours' => 'All',
        '4_morning_hours' => 'All',
        '4_afternoon_hours' => '10:00AM - 11:00PM',
        '4_night_hours' => 'All',
        '5_morning_hours' => 'All',
        '5_afternoon_hours' => '10:00AM - 9:00PM',
        '5_night_hours' => 'All',
        '6_afternoon_hours' => '12:00PM - 5:00PM',
        '7_afternoon_hours' => '12:00PM - 5:00PM',
        'updated_at' => Carbon::now(), 'created_at' => Carbon::now()]
        );
        echo "Hours saved for ".$name;
      }

      $name = "Jay's Place";
      echo $name;
      if (FoodHours::where('name', '=', $name)->exists()) {
        echo $name." already exists";
      }
      else {
        DB::table('food_hours')->insert(
        ['name' => $name, 'type' => 'store',
        '7_morning_hours' => 'All', //if this exists, don't show closed
        '7_afternoon_hours' => 'All',
        '7_night_hours' => '7:00PM - 1:00AM',
        '1_morning_hours' => 'All', //if this exists, don't show closed
        '1_afternoon_hours' => 'All',
        '1_night_hours' => '7:00PM - 1:00AM',
        '2_morning_hours' => 'All', //if this exists, don't show closed
        '2_afternoon_hours' => 'All',
        '2_night_hours' => '7:00PM - 1:00AM',
        '3_morning_hours' => 'All', //if this exists, don't show closed
        '3_afternoon_hours' => 'All',
        '3_night_hours' => '7:00PM - 1:00AM',
        '4_morning_hours' => 'All', //if this exists, don't show closed
        '4_afternoon_hours' => 'All',
        '4_night_hours' => '7:00PM - 1:00AM',
        '5_morning_hours' => 'All', //if this exists, don't show closed
        '5_afternoon_hours' => 'All',
        '5_night_hours' => '8:00PM - 2:00AM',
        '6_morning_hours' => 'All', //if this exists, don't show closed
        '6_afternoon_hours' => 'All',
        '6_night_hours' => '8:00PM - 2:00AM',
        'updated_at' => Carbon::now(), 'created_at' => Carbon::now()]
        );
        echo "Hours saved for ".$name;
      }

      $name = "The Motley";
      echo $name;
      if (FoodHours::where('name', '=', $name)->exists()) {
        echo $name." already exists";
      }
      else {
        DB::table('food_hours')->insert(
        ['name' => $name, 'type' => 'store',
        '7_morning_hours' => 'All', //if this exists, don't show closed
        '7_afternoon_hours' => '11:00AM - 5:00PM',
        '7_night_hours' => '8:00PM - 12:00AM',
        '1_morning_hours' => '8:00AM - 12AM', //if this exists, don't show closed
        '1_afternoon_hours' => 'All',
        '1_night_hours' => 'All',
        '2_morning_hours' => '8:00AM - 12AM', //if this exists, don't show closed
        '2_afternoon_hours' => 'All',
        '2_night_hours' => 'All',
        '3_morning_hours' => '8:00AM - 12AM', //if this exists, don't show closed
        '3_afternoon_hours' => 'All',
        '3_night_hours' => 'All',
        '4_morning_hours' => '8:00AM - 12AM', //if this exists, don't show closed
        '4_afternoon_hours' => 'All',
        '4_night_hours' => 'All',
        '5_morning_hours' => 'All', //if this exists, don't show closed
        '5_afternoon_hours' => 'All',
        '5_night_hours' => '8:00PM - 2:00AM',
        '6_morning_hours' => 'All', //if this exists, don't show closed
        '6_afternoon_hours' => '11:00AM - 5PM',
        '6_night_hours' => 'All',
        'updated_at' => Carbon::now(), 'created_at' => Carbon::now()]
        );
        echo "Hours saved for ".$name;
      }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
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
