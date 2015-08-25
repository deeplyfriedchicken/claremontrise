<?php

namespace App\Console\Commands;
use Illuminate\Http\Request;
use Goutte\Client;
use Carbon\Carbon;
use App\AthSpeakers;
use DB;


use Illuminate\Console\Command;

class ScrapeAthSpeakers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'athspeakers:scrape';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fall 2015 Ath Speakers.';

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
      $client = new Client();
      $crawler = $client->request('GET', 'https://www.cmc.edu/athenaeum/fall-2015-calendar');
      $status_code = $client->getResponse()->getStatus();
      if($status_code==200) {
          echo '200 OK<br>';
      }
      $count = 0;
      $crawler->filter('table tr')->each(function ($node, $count) {
        $date = trimWhiteSpace($node->children()->eq(0)->text()); //date & when
        if(strpos($date, 'Oct. 14') !== false) {
          $date = getAthDate2($date);
        }
        else {
          $date = getDateAthSpeakers($date);
        }
        $year = $date[0];
        $month = date_parse($date[1]);
        $month = $month['month'];
        $day = trimWhiteSpace($date[2]);
        $when = 'Dinner';
        if(!is_numeric($day)) {
          $when = 'Lunch @ 11:30';
          $day = substr(preg_replace("/[^0-9,.]/", "", $day),0, -4); //gets day -1130
        }
        if(strlen($day) < 2) {
          $day = "0".$day; //add 0 if its single digit
        }
        $date = $year."-".$month."-".$day; //add together
        echo $date;
        $date = Carbon::createFromFormat('Y-m-d', $date)->toDateString(); //format
        if($node->children()->eq(1)->children()->eq(1)->count() > 0) {
          echo "not empty"."<br>";
          $description = mb_convert_encoding(trimWhiteSpace($node->children()->eq(1)->children()->eq(1)->text()), "HTML-ENTITIES", "UTF-8"); //description
          $title = mb_convert_encoding(trimWhiteSpace($node->children()->eq(1)->children()->eq(0)->text()), "HTML-ENTITIES", "UTF-8");
          $speaker = 'N/A';
          if($node->children()->eq(1)->children()->eq(1)->filter('strong')->count() > 0) {
            $speaker = mb_convert_encoding(trimWhiteSpace($node->children()->eq(1)->children()->eq(1)->filter('strong')->text()), "HTML-ENTITIES", "UTF-8"); //speaker
          }
          $id = DB::table('email_articles')->where('post_date', $date)->value('article_id');
          if (AthSpeakers::where('speaker', '=', $speaker)->exists()) {
            echo $speaker." already exists";
          }
          else {
            $event = new AthSpeakers;
            $event->article_id = $id;
            $event->speaker = $speaker;
            $event->description = $description;
            $event->title = $title;
            $event->event_time = $when;
            $event->save();
            echo "stored ".$speaker."!";
          }
        }
        $count++;
      });
    }
}
