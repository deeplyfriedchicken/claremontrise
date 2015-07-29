<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Carbon\Carbon;
use DB;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller {

    public function sendEmail() {
      $date = Carbon::today();
      $date1 = substr($date->addDays(1), 0, 10);
      $date2 = substr($date->addDays(1), 0, 10);
      $date3 = substr(Carbon::today()->addDays(40), 0, 10);
      $date0 = substr(Carbon::today(), 0, 10);

      $id[0] = DB::table('email_articles')->where('post_date', $date0)->value('article_id');
      $id[1] = DB::table('email_articles')->where('post_date', '=', $date1)->value('article_id');
      $id[2] = DB::table('email_articles')->where('post_date', '=', $date2)->value('article_id');
      $id[3] = DB::table('email_articles')->where('post_date', '=', $date3)->value('article_id');

      $events = DB::select(DB::raw("SELECT * FROM events WHERE article_id >= '$id[0]' AND article_id < '$id[3]' AND type = 'event'"));

      $collegeNews = DB::select(DB::raw("SELECT * FROM events WHERE article_id <= '$id[0]'"));

      $icons = DB::table('icons')->get();

      $menu1 = DB::table('dining_hall_food')->where('store_id', '4')->where('meal', 'breakfast')->get();

      $menu2 = DB::table('dining_hall_food')->where('store_id', '4')->where('meal', 'lunch')->get();

      $menu3 = DB::table('dining_hall_food')->where('store_id', '4')->where('meal', 'dinner')->get();

      $weather = DB::table('weather')->where('article_id', $id[0])->get();
      $weather2 = DB::table('weather')->where('article_id', $id[1])->get();
      $weather3 = DB::table('weather')->where('article_id', $id[2])->get();

      $posts = DB::table('posts')->where('article_id', '=', $id[0])->where('article_id', '=', $id[1])->where('article_id', '=', $id[2]);

      $pp = DB::table('sports')->where('college', 'PP')->get();

      $cms = DB::table('sports')->where('college', 'CMS')->get();
      Mail::send('template', ['id' => $id, 'date' => Carbon::today(), 'menu1' => $menu1, 'menu2' => $menu2, 'menu3' => $menu3, 'icons' => $icons, 'collegeNews' => $collegeNews, 'weather' => $weather, 'weather2' => $weather2, 'weather3' => $weather3, 'posts' => $posts, 'events' => $events, 'pp' => $pp, 'cms' => $cms], function($message)
      {
        $message->to('kevin.a.cunanan@gmail.com', 'Kevin')->subject('This is a demo!');
      });
    }

    public function template() {
      $date = Carbon::today();
      $date1 = substr($date->addDays(1), 0, 10);
      $date2 = substr($date->addDays(1), 0, 10);
      $date3 = substr(Carbon::today()->addDays(40), 0, 10);
      $date0 = substr(Carbon::today(), 0, 10);

      $id[0] = DB::table('email_articles')->where('post_date', $date0)->value('article_id');
      $id[1] = DB::table('email_articles')->where('post_date', '=', $date1)->value('article_id');
      $id[2] = DB::table('email_articles')->where('post_date', '=', $date2)->value('article_id');
      $id[3] = DB::table('email_articles')->where('post_date', '=', $date3)->value('article_id');

      $events = DB::select(DB::raw("SELECT * FROM events WHERE article_id >= '$id[0]' AND article_id < '$id[3]' AND type = 'event'"));

      $collegeNews = DB::select(DB::raw("SELECT * FROM events WHERE article_id <= '$id[0]'"));

      $icons = DB::table('icons')->get();

      $menu1 = DB::table('dining_hall_food')->where('store_id', '4')->where('meal', 'breakfast')->where('article_id', $id[0])->get();

      $menu2 = DB::table('dining_hall_food')->where('store_id', '4')->where('meal', 'lunch')->where('article_id', $id[0])->get();

      $menu3 = DB::table('dining_hall_food')->where('store_id', '4')->where('meal', 'dinner')->where('article_id', $id[0])->get();

      $weather = DB::table('weather')->where('article_id', $id[0])->get();
      $weather2 = DB::table('weather')->where('article_id', $id[1])->get();
      $weather3 = DB::table('weather')->where('article_id', $id[2])->get();

      $posts = DB::table('posts')->where('article_id', '=', $id[0])->where('article_id', '=', $id[1])->where('article_id', '=', $id[2]);

      $pp = DB::table('sports')->where('college', 'PP')->get();

      $cms = DB::table('sports')->where('college', 'CMS')->get();

      $gif = DB::table('gifs')->where('article_id', $id)->get();
      var_dump($gif);

      return view('template', ['id' => $id, 'date' => Carbon::today(), 'gif' => $gif, 'menu1' => $menu1, 'menu2' => $menu2, 'menu3' => $menu3, 'icons' => $icons, 'collegeNews' => $collegeNews, 'weather' => $weather, 'weather2' => $weather2, 'weather3' => $weather3, 'posts' => $posts, 'events' => $events, 'pp' => $pp, 'cms' => $cms]);
    }

    public function populate() {
      $begin = new \DateTime( '2014-01-01' );
      $end = new \DateTime( '2019-01-01' );
      $end = $end->modify( '+1 day' );
      $interval = new \DateInterval( 'P1D' );
      $daterange = new \DatePeriod( $begin , $interval , $end );

      foreach($daterange as $date) {
        $post_date = $date->format("Y-m-d"); //mysql DATE format
        echo $post_date;
        $article = new Article;
        $article->post_date = $post_date;
        $article->file_directory = 'n/a';
        $article->save();
        echo "New Article!";
      }

    }

    public function getAllData() {
       $users = $users = DB::table('users')->get();
       echo "Users: ";
       echo "<br>";
       foreach($users as $user) {
         echo $user->name;
         echo $user->email;
         echo "<br>";
       }
       $events = DB::table('events')->get();
       echo "Events And News: ";
       echo "<br>";
       foreach($events as $event) {
         echo $event->title;
         echo "<br>";
       }
       $weather = DB::table('weather')->get();
       echo "Weather: ";
       echo "<br>";
       foreach($weather as $we) {
         echo $we->max;
         echo $we->min;
         echo $we->current_temp;
         echo "<br>";
       }
       $posts = DB::table('posts')->get();
       echo "College Posts: ";
       echo "<br>";
       foreach($posts as $post) {
         echo $post->title;
         echo $post->author;
         echo $post->source;
         echo "<br>";
       }
       $subscribers = DB::table('subscribers')->get();
       foreach($subscribers as $subscriber) {
         $email = $subscriber->email;
         Mail::send('email', ['subscriber' => $subscriber, 'weather' => $weather, 'posts' => $posts, 'events' => $events], function($message) use ($email)
         {
           $message->to($email)->subject('Welcome To Claremont Rise');
         });
         echo "Sent to ".$email."!";
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
