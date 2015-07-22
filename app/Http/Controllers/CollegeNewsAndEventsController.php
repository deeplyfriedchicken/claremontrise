<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use Carbon\Carbon;
use App\EventAndNews;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
require 'ScraperController.php';

class CollegeNewsAndEventsController extends Controller
{
    public function scrapeCmcEvents() {
      $client = new Client();
      $crawler = $client->request('GET', 'http://www.cmc.edu/news/events');
      $status_code = $client->getResponse()->getStatus();
      if($status_code==200) {
          echo '200 OK<br>';
      }
      $time2 = null;
      $crawler->filter('div.article')->each(function ($node) {
        $title = trimWhiteSpace($node->filter('h4')->text()); //title
        $url = "http://www.cmc.edu".$node->filter('h4 a')->attr('href'); //url
        $times = $node->filter('p span')->each(function ($node2, $count) { //save the values of time in array
          if($count = 0 && $node2->attr('content')) {
             $times[0] = $node2->attr('content');
             return $times;
          }
          if($count = 1 && $node2->attr('content')) {
            $times[1] = $node2->attr('content');
            return $times;
          }
          $count++;
        });
        $times = (array_slice(array_filter($times), 0)); //array gets messy, cleaned up
        $time1 = substr(str_replace("T", " ", $times[0][1]), 0, -6); //remove T, and remove last 6 digits of time
        $date = substr($time1, 0, 10); //get date of start
        if(isset($times[1][1])) {
          $time2 = substr(str_replace("T", " ", $times[1][1]), 0, -6); //second time
        }
        echo "<br>";
        $id = DB::table('email_articles')->where('post_date', $date)->value('article_id');
        if (EventAndNews::where('title', '=', $title)->exists()) {
          echo $title." already exists";
        }
        else {
          $event = new EventAndNews;
          $event->article_id = $id;
          $event->title = $title;
          $event->url = $url;
          $event->time1 = $time1;
          if(isset($time2)) {
            $event->time2 = $time2;
          }
          $event->type = 'event';
          $event->save();
          echo "stored!";
        }
      });

    }

    public function scrapeCmcNews() {

      $client = new Client();
      $crawler = $client->request('GET', 'http://www.cmc.edu/news/news-releases');
      $status_code = $client->getResponse()->getStatus();
      if($status_code==200) {
          echo '200 OK<br>';
      }

      $crawler->filter('div.view-content > div')->each(function ($node) {
        $imgUrl = null;
        $title = $node->filter('h4 a')->text(); //title
        $url = "http://www.cmc.edu".$node->filter('h4 a')->attr('href'); //url
        if($node->filter('a img')->count()) {
          $imgUrl = $node->filter('img')->attr('src'); //img src
        }

        $date = $node->filter('p')->text();
        $date = createDate($date); //date
        $id = DB::table('email_articles')->where('post_date', $date)->value('article_id');
        if (EventAndNews::where('title', '=', $title)->exists()) {
          echo $title." exists";
          echo "<br>";
        }
        else {
          $event = new EventAndNews;
          $event->article_id = $id;
          $event->title = $title;
          $event->url = $url;
          if(isset($imgUrl)) {
            $event->imgUrl = $imgUrl;
          }
          $event->time1 = $date;
          $event->type = 'news';
          $event->save();
          echo "stored: ".$title;
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
