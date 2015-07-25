<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Posts;

use App\Http\Requests;
use App\Http\Controllers\Controller;
require 'ScraperController.php';

class BuzzFeedController extends Controller
{

    public function getXML() {
      $xml = simplexml_load_file('http://www.buzzfeed.com/index.xml','SimpleXMLElement', LIBXML_NOCDATA);

      $count = 0;

      foreach($xml->channel->item as $article) {
        $title = $article->title;
        $url = $article->link;
        $author = $article->author;
        $start = strpos($article->pubDate, ',');
        $date = substr($article->pubDate, $start +2, -15);
        $date = explode(' ', $date);
        $day = $date[0]; //day
        $month = $date[1]; //month
        $month = substr(Carbon::parse($month),5,2);
        $year = $date[2]; //year
        $date = substr(Carbon::createFromFormat("Y-m-d", $year."-".$month."-".$day),0,10);
          $description = $article->description;
          $imgPos = strpos($description, '<img');
          $imgUrl = null;
          if($imgPos != null) {
            $imgString = substr($description, $imgPos);
            $srcPos = strpos($imgString, 'src=');
            $src = substr($imgString, $srcPos + 5);
            $tok = '"';
            $endQuotePos = strpos($src, $tok);
            $imgUrl = substr($src, 0, $endQuotePos);
          }

        $id = DB::table('email_articles')->where('post_date', $date)->value('article_id');
        if($count < 5) {
          if(!isset($imgUrl)) {

          }
          else {
            if (Posts::where('title', '=', $title)->exists()) {
              echo $title." already exists";
            }
            else {
              $post = new Posts;
              $post->article_id = $id;
              $post->author = $author;
              $post->title = $title;
              $post->description = 'N/A';
              $post->imgUrl = $imgUrl;
              $post->url = $url;
              $post->source = 'BuzzFeed';
              $post->save();
              echo "stored ".$title."!";
            }
            $count++;
          }
        }
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
