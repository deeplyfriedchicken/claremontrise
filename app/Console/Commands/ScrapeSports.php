<?php

namespace App\Console\Commands;
use DB;
use Goutte\Client;
use Carbon\Carbon;
use App\Sports;

use Illuminate\Console\Command;

class ScrapeSports extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sports:scrape';

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
        $client = new Client();
        $crawler = $client->request('GET', 'http://www.cmsathletics.org/composite?y=2015&m=08');
        $status_code = $client->getResponse()->getStatus();
        if($status_code==200) {
            echo '200 OK<br>';
        }
        $month = $crawler->filter('table.calendar tr td.calendar-month')->text();
        $month = explode(' ', $month);
        $year = trimWhiteSpace($month[1]);
        $month = trimWhiteSpace($month[0]);
        $month = date_parse($month);
        $month = $month['month'];
        $crawler->filter('table.calendar')->filter('tr')->each(function ($node) use($month, $year) {
            $node->filter('td div.calendar-event')->each(function ($node1) use($month, $year) {
              $day = trimWhiteSpace($node1->parents()->filter('div.calendar-date')->text());
              if(strlen($day) < 2) {
                $day = "0".$day; //add 0 if its single digit
              }
              $team =  $node1->filter('div.calendar-sport')->text(); //team
              $length = strlen($team);
              $info = substr(trimWhiteSpace(preg_replace("/\s+/", " ", $node1->text())), $length+1);
              $time = trimWhiteSpace(substr($info, -8));
              $time = explode(" ", $time);
              $time1 = $time[0].":00";
              $time = strtotime($time1." ".$time[1]);
              $time = substr(Carbon::createFromTimeStamp($time)->toDateTimeString(), -8);
              $opponent = substr($info, 0, -8);
              $opponent = trimWhiteSpace($opponent);
              if(strlen($month) < 2) {
                $month = "0".$month; //add 0 if its single digit
              }
              $date = $year."-".$month."-".$day;
              $datetime = $date." ".$time;
              $id = DB::table('email_articles')->where('post_date', $date)->value('article_id');
              if (Sports::where('team', '=', $team)->where('opponent', '=', $opponent)->exists()) {
                echo $team." ".$opponent." already exists";
              }
              else {
                $game = new Sports;
                $game->article_id = $id;
                $game->college = 'CMS';
                $game->team = $team;
                $game->opponent = $opponent;
                $game->time_start = $datetime;
                $game->save();
                echo $team." ".$opponent." stored!";
              }
          });
        });

        $client = new Client();
        $crawler = $client->request('GET', 'http://www.pe.pomona.edu/composite');
        $status_code = $client->getResponse()->getStatus();
        if($status_code==200) {
            echo '200 OK<br>';
        }
        $month = $crawler->filter('table tr.cal-nav td[colspan="5"]')->text();
        $month = explode(' ', $month);
        $year = trimWhiteSpace($month[1]);
        $month = trimWhiteSpace($month[0]);
        $month = date_parse($month);
        $month = $month['month'];
        $crawler->filter('table')->filter('tr')->each(function ($node) use($month, $year) {
            $node->filter('td.cal-day div.cal-event')->each(function ($node1) use($month, $year) {
              $day = trimWhiteSpace($node1->parents()->filter('div.cal-date')->text());
              if(strlen($day) < 2) {
                $day = "0".$day; //add 0 if its single digit
              }
              $team = trimWhiteSpace($node1->filter('div.cal-sport')->text()); //team
              $length = strlen($team);
              $time = $node1->filter('div.cal-sport')->nextAll()->first()->nextAll()->first()->text();
              $date = $year."-".$month."-".$day;
              if($time == 'TBA') {
                $datetime = $date." "."00:00:00";
              }
              else {
                $time = explode(" ", $time);
                $time1 = $time[0].":00";
                $time = strtotime($time1." ".$time[1]);
                $time = substr(Carbon::createFromTimeStamp($time)->toDateTimeString(), -8);
                if(strlen($month) < 2) {
                  $month = "0".$month; //add 0 if its single digit
                }
                $datetime = $date." ".$time;
              }
              $opponent = trimWhiteSpace($node1->filter('div.cal-sport')->nextAll()->first()->text());

              $id = DB::table('email_articles')->where('post_date', $date)->value('article_id');
              if (Sports::where('team', '=', $team)->where('opponent', '=', $opponent)->exists()) {
                echo $team." ".$opponent." already exists";
              }
              else {
                $game = new Sports;
                $game->article_id = $id;
                $game->college = 'PP';
                $game->team = $team;
                $game->opponent = $opponent;
                $game->time_start = $datetime;
                $game->save();
                echo $team." ".$opponent." stored!";
              }
          });
        });
    }
}
