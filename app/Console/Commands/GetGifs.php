<?php

namespace App\Console\Commands;
use Goutte\Client;
use Carbon\Carbon;
use App\Gifs;
use DB;

use Illuminate\Console\Command;

class GetGifs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gif:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
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
}
