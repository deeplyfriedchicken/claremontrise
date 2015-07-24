<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use Carbon\Carbon;
use App\AthSpeakers;
use App\AthFood;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
require 'ScraperController.php';

class AthenaeumController extends Controller
{

    public function scrapeSpeakers() {
      $client = new Client();
      $crawler = $client->request('GET', 'https://www.cmc.edu/athenaeum/spring-2015-program-calendar');
      $status_code = $client->getResponse()->getStatus();
      if($status_code==200) {
          echo '200 OK<br>';
      }
      $count = 0;
      $crawler->filter('table tr')->each(function ($node, $count) {
        $date = trimWhiteSpace($node->children()->eq(0)->text()); //date & when
        echo "<br>";
        $date = getDateAthSpeakers($date);
        $year = $date[0];
        $month = date_parse($date[1]);
        $month = $month['month'];
        $day = trimWhiteSpace($date[2]);
        $when = 'N/A';
        if(!is_numeric($day)) {
          $when = substr($day, -10); //Lunch?
          $day = substr(preg_replace("/[^0-9,.]/", "", $day),0, -4); //gets day -1130
        }
        if(strlen($day) < 2) {
          $day = "0".$day; //add 0 if its single digit
        }
        $date = $year."-".$month."-".$day; //add together
        $date = Carbon::createFromFormat('Y-m-d', $date)->toDateString(); //format
        $description = substr(mb_convert_encoding(trimWhiteSpace($node->children()->eq(1)->text()), "HTML-ENTITIES", "UTF-8"), 0, 500); //description
        $speaker = mb_convert_encoding(trimWhiteSpace($node->children()->eq(1)->children()->first()->text()), "HTML-ENTITIES", "UTF-8"); //speaker

        $id = DB::table('email_articles')->where('post_date', $date)->value('article_id');
        if (AthSpeakers::where('speaker', '=', $speaker)->exists()) {
          echo $speaker." already exists";
        }
        else {
          $event = new AthSpeakers;
          $event->article_id = $id;
          $event->speaker = $speaker;
          $event->description = $description;
          $event->event_time = $when;
          $event->save();
          echo "stored ".$speaker."!";
        }
        $count++;
      });
    }

    public function scrapeFood() {
      $client = new Client();
      $crawler = $client->request('GET', 'http://www1.claremontmckenna.edu/mmca/cur_menu.php');
      $status_code = $client->getResponse()->getStatus();
      if($status_code==200) {
          echo '200 OK<br>';
      }
      $count = 0;
      $crawler->filter('table')->last()->each(function ($node) {
        $times = $node->filter('tr')->filter('td')->each(function ($node2, $count) {
          if($count % 2 == 0) {
            $date = $node2->text();
            $date = explode(',', $date);
            $date = $date[1];
            $date = explode(' ', $date);
            $month = date_parse($date[0]);
            $month = $month['month'];
            $day = $date[1];
            if(strlen($day) < 2) {
              $day = "0".$day; //add 0 if its single digit
            }
            $year = 2015;
            $date = $year."-".$month."-".$day; //add together
            $date = Carbon::createFromFormat('Y-m-d', $date)->toDateString(); //format
            return $date;
          }
        });
        $values = $node->filter('tr')->filter('td')->each(function ($node1, $count) {
          if($count % 2 == 1) {
            $foods = trimWhiteSpace($node1->children()->last()->children()->first()->html());
            $main = trimWhiteSpace($node1->children()->last()->children()->last()->html());
            $foods = ltrim(rtrim(str_replace("<br>", '-', $foods), "-"), "-");
            $foods = explode('-', $foods);
            $main = ltrim(rtrim(str_replace("--", "-", str_replace("<br>", '-', $main)), "-"), "-");
            $main = explode('-', $main);
            return $main;
          }
          $count++;
        });
        $values = (array_slice(array_filter($values), 0));
        $times = (array_slice(array_filter($times), 0));
        for($i=0; $i<count($values); $i++) {
          $foods = "";
          $count_food = 0;

          for($j=0;$j<count($values[$i]);$j++){
            $foods[$j] = $values[$i][$j];
          }
          $date = $times[$i];
          $id = DB::table('email_articles')->where('post_date', $date)->value('article_id');
          $ath_id = DB::table('ath')->where('article_id', $id)->where('event_time', 'N/A')->value('ath_id');
          if (AthFood::where('food_1', '=', $foods[0])->exists()) {
            echo $foods[0]." already exists";
          }
          else {
            $menu = new AthFood;
            $menu->article_id = $id;
            $menu->ath_id = $ath_id;
            $menu->food_1 = $foods[0];
            if(isset($foods[1])) {
              $menu->food_2 = $foods[1];
            }
            if(isset($foods[2])) {
              $menu->food_3 = $foods[2];
            }
            if(isset($foods[3])) {
              $menu->food_4 = $foods[3];
            }
            if(isset($foods[4])) {
              $menu->food_5 = $foods[4];
            }
            $menu->save();
            echo "stored!";
          }
        }
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
     * @return Response
     */
    public function store()
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
