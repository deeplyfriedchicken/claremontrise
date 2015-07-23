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
        echo trimWhiteSpace($node->children()->eq(0)->text()); //date & when
        echo "<br>";
        echo mb_convert_encoding(trimWhiteSpace($node->children()->eq(1)->text()), "HTML-ENTITIES", "UTF-8"); //description
        echo "<br>";
        echo mb_convert_encoding(trimWhiteSpace($node->children()->eq(1)->children()->first()->text()), "HTML-ENTITIES", "UTF-8"); //speaker
        echo "<br>";
        $count++;
      });
    }

    public function scrapeFood() {

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
