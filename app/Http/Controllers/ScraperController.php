<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use Carbon\Carbon;
use App\EventAndNews;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

function createDate($date) {
  $date = substr($date, strpos($date, '•') + 4); //date needs cleaning
  $date = $date;
  $timeArray = explode(' ', $date);
  $month = $timeArray[0];
  $day = rtrim($timeArray[1], ',');
  $year = $timeArray[2];
  $timestamp = strtotime($day." ".$month." ".$year);
  return $date = Carbon::createFromTimeStamp($timestamp);
}
function createDateAntlers($date) {
  $timeArray = explode(' ', $date);
  $month = $timeArray[0];
  $day = rtrim($timeArray[1], ',');
  $year = $timeArray[2];
  $timestamp = strtotime($day." ".$month." ".$year);
  return $date = Carbon::createFromTimeStamp($timestamp);
}
function trimWhiteSpace($str) {
  $str = rtrim($str);
  $str = ltrim($str);
  return $str;
}
function getArticleId($date) {
  $id = DB::table('email_articles')->where('post_date', $date)->value('article_id');
  return $id;
}

class ScraperController extends Controller {

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
     * @return Response
     */
    public function store()
    {
        echo "HELLLO";
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
     * @param  int  $id
     * @return Response
     */
    public function update($id)
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
