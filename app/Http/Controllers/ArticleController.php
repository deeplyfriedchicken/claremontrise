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
      Mail::send('home', array('firstname'=>'Kevin'), function($message)
      {
        $message->to('kevin.a.cunanan@gmail.com', 'Kevin')->subject('This is a demo!');
      });
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
