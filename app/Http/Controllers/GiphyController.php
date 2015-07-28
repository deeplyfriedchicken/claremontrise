<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use Carbon\Carbon;
use App\Gifs;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GiphyController extends Controller
{

    public function getThisWeeksGifs() {
      $key = env('GIPHY_API_KEY');
      $client = new Client();
      $url = 'http://api.giphy.com/v1/gifs/random?api_key='.$key.'&tag=funny&fmt=html';
      $crawler = $client->request('GET', $url);
      $status_code = $client->getResponse()->getStatus();
      if($status_code==200) {
          echo '200 OK<br>';
      }
      $date = substr(Carbon::today(),0,10);
      $imgUrl = $crawler->filter('img')->attr('src');
      $id = DB::table('email_articles')->where('post_date', $date)->value('article_id');
      if(Gifs::where('article_id', $id)->exists()) {
        if(Gifs::where('imgUrl', $imgUrl)->exists()) {
          $client2 = new Client();
          $url = 'http://api.giphy.com/v1/gifs/random?api_key='.$key.'&tag=funny&fmt=html';
          $crawler2 = $client2->request('GET', $url);
          $imgUrl = $crawler2->filter('img')->attr('src');
          Gifs::where('article_id', $id)->update(['imgUrl' => $imgUrl]);
          echo "found new image";
          echo "stage 1";
        }
        else {
          Gifs::where('article_id', $id)->update(['imgUrl' => $imgUrl]);
          echo "Gif for ".$date." stored!";
          echo "stage 2";
        }
      }
      else {
        if(Gifs::where('imgUrl', $imgUrl)->exists()) {
          $client2 = new Client();
          $url = 'http://api.giphy.com/v1/gifs/random?api_key='.$key.'&tag=funny&fmt=html';
          $crawler2 = $client2->request('GET', $url);
          $imgUrl = $crawler2->filter('img')->attr('src');
          Gifs::where('article_id', $id)->update(['imgUrl' => $imgUrl]);
          echo "found new image";
          echo "stage 3";
        }
        else {
          $id = DB::table('email_articles')->where('post_date', $date)->value('article_id');
          $gif = new Gifs;
          $gif->article_id = $id;
          $gif->imgUrl = $imgUrl;
          $gif->save();
          echo "Gif for ".$date." stored!";
          echo "stage 4";
        }
      }
      echo '<img src="'.$imgUrl.'">';
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
