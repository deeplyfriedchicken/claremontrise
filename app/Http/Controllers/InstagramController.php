<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Instagrams;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InstagramController extends Controller
{
    public function getInstagramPhotos() {
      $code = env('INSTAGRAM_ACCESS_TOKEN');
      $url = 'https://api.instagram.com/v1/users/201125743/media/recent/?access_token=47007620.d6ae493.b71d91953f4e4205a78d0d7427d66b52'.$code; //CMC_NEWS_URL
      $content = file_get_contents($url);
      $json = json_decode($content, true);
      $count = 575;
        foreach($json['data'] as $images) {
          if (Instagrams::where('article_id', '=', $count)->exists()) {
            echo "There is already something here";
          }
          else {
            $imgUrl = $images['images']['standard_resolution']['url'];
            $description = $images['caption']['text'];
            $insta = new Instagrams;
            $insta->article_id = $count;
            $insta->imgUrl = $imgUrl;
            $insta->caption = $description;
            $insta->save();
            echo "<img src=".$imgUrl.">";
            echo "<br>";
            echo $description;
            echo "<br>";
            echo "STORED!";
          }
          $count++;
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
