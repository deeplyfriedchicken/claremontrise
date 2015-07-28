<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Goutte\Client;
use Carbon\Carbon;
use App\Sports;

use App\Http\Requests;
use App\Http\Controllers\Controller;
require 'ScraperController.php';

class SportsController extends Controller
{

    public function scrapeCmsSchedule() {
      $client = new Client();
      $crawler = $client->request('GET', 'http://www.cmsathletics.org/composite?y=2015&m=08');
      $status_code = $client->getResponse()->getStatus();
      if($status_code==200) {
          echo '200 OK<br>';
      }
      $month = $crawler->filter('table.calendar tr td.calendar-month')->text();
      $month = explode(' ', $month);
      $year = trimWhiteSpace($month[1]);
      $month = trimWhiteSpace($month[0]);
      $month = date_parse($month);
      $month = $month['month'];
      $countRow = 0;
      $crawler->filter('table.calendar')->filter('tr')->each(function ($node, $countRow) use($month, $year) {
          $node->filter('td div.calendar-event')->each(function ($node1) use($month, $year, $countRow) {
            echo $countRow;
            $day = trimWhiteSpace($node1->parents()->filter('div.calendar-date')->text());
            if($day < 10 && $countRow > 3) {
              $month++;
            }
            if($day > 20 && $countRow < 1) {
              $month--;
            }
            if(strlen($day) < 2) {
              $day = "0".$day; //add 0 if its single digit
            }
            $team =  $node1->filter('div.calendar-sport')->text(); //team
            $length = strlen($team);
            $info = substr(trimWhiteSpace(preg_replace("/\s+/", " ", $node1->text())), $length+1);
            $time = trimWhiteSpace(substr($info, -8));
            $time = explode(" ", $time);
            $time1 = $time[0].":00";
            $time = strtotime($time1." ".$time[1]);
            $time = substr(Carbon::createFromTimeStamp($time)->toDateTimeString(), -8);
            $opponent = substr($info, 0, -8);
            $opponent = trimWhiteSpace($opponent);
            if(strlen($month) < 2) {
              $month = "0".$month; //add 0 if its single digit
            }
            $date = $year."-".$month."-".$day;
            echo $date;
            $datetime = $date." ".$time;
            $id = DB::table('email_articles')->where('post_date', $date)->value('article_id');
            if (Sports::where('team', '=', $team)->where('opponent', '=', $opponent)->exists()) {
              echo $team." ".$opponent." already exists";
            }
            else {
              $game = new Sports;
              $game->article_id = $id;
              $game->college = 'CMS';
              $game->team = $team;
              $game->opponent = $opponent;
              $game->time_start = $datetime;
              $game->save();
              echo $team." ".$opponent." stored!";
            }
        });
        $countRow++;
      });
    }

    public function scrapePPSchedule() {
      $client = new Client();
      $crawler = $client->request('GET', 'http://www.pe.pomona.edu/composite');
      $status_code = $client->getResponse()->getStatus();
      if($status_code==200) {
          echo '200 OK<br>';
      }
      $month = $crawler->filter('table tr.cal-nav td[colspan="5"]')->text();
      $month = explode(' ', $month);
      $year = trimWhiteSpace($month[1]);
      $month = trimWhiteSpace($month[0]);
      $month = date_parse($month);
      $month = $month['month'];
      $countRow = 0;
      $crawler->filter('table')->filter('tr')->each(function ($node, $countRow) use($month, $year) {
          $node->filter('td.cal-day div.cal-event')->each(function ($node1) use($month, $year, $countRow) {
            $day = trimWhiteSpace($node1->parents()->filter('div.cal-date')->text());
            if($day < 10 && $countRow > 2) {
              $month++;
            }
            if($day > 20 && $countRow < 1) {
              $month--;
            }
            if(strlen($day) < 2) {
              $day = "0".$day; //add 0 if its single digit
            }
            $team = trimWhiteSpace($node1->filter('div.cal-sport')->text()); //team
            $length = strlen($team);
            $time = $node1->filter('div.cal-sport')->nextAll()->first()->nextAll()->first()->text();
            $date = $year."-".$month."-".$day;
            if($time == 'TBA') {
              $datetime = $date." "."00:00:00";
            }
            else {
              $time = explode(" ", $time);
              $time1 = $time[0].":00";
              $time = strtotime($time1." ".$time[1]);
              $time = substr(Carbon::createFromTimeStamp($time)->toDateTimeString(), -8);
              if(strlen($month) < 2) {
                $month = "0".$month; //add 0 if its single digit
              }
              $datetime = $date." ".$time;
            }
            $opponent = trimWhiteSpace($node1->filter('div.cal-sport')->nextAll()->first()->text());

            $id = DB::table('email_articles')->where('post_date', $date)->value('article_id');
            if (Sports::where('team', '=', $team)->where('opponent', '=', $opponent)->exists()) {
              echo $team." ".$opponent." already exists";
            }
            else {
              $game = new Sports;
              $game->article_id = $id;
              $game->college = 'PP';
              $game->team = $team;
              $game->opponent = $opponent;
              $game->time_start = $datetime;
              $game->save();
              echo $team." ".$opponent." stored!";
            }
        });
        $countRow++;
      });
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
