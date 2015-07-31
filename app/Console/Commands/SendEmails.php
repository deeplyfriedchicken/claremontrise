<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use DB;
use Mail;

use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

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
      $date = Carbon::today();
      $date1 = substr($date->addDays(1), 0, 10);
      $date2 = substr($date->addDays(1), 0, 10);
      $date3 = substr(Carbon::today()->addDays(40), 0, 10);
      $date0 = substr(Carbon::today(), 0, 10);

      $id[0] = DB::table('email_articles')->where('post_date', $date0)->value('article_id');
      $id[1] = DB::table('email_articles')->where('post_date', '=', $date1)->value('article_id');
      $id[2] = DB::table('email_articles')->where('post_date', '=', $date2)->value('article_id');
      $id[3] = DB::table('email_articles')->where('post_date', '=', $date3)->value('article_id');

      $events = DB::select(DB::raw("SELECT * FROM events WHERE article_id >= '$id[0]' AND article_id < '$id[3]' AND type = 'event' LIMIT 3"));

      $collegeNews = DB::select(DB::raw("SELECT * FROM events WHERE article_id <= '$id[0]'"));

      $icons = DB::table('icons')->get();

      $menu1 = DB::table('dining_hall_food')->where('store_id', '4')->where('meal', 'breakfast')->where('article_id', $id[0])->get();

      $menu2 = DB::table('dining_hall_food')->where('store_id', '4')->where('meal', 'lunch')->where('article_id', $id[0])->get();

      $menu3 = DB::table('dining_hall_food')->where('store_id', '4')->where('meal', 'dinner')->where('article_id', $id[0])->get();

      $weather = DB::table('weather')->where('article_id', $id[0])->get();
      $weather2 = DB::table('weather')->where('article_id', $id[1])->get();
      $weather3 = DB::table('weather')->where('article_id', $id[2])->get();

      $ga = DB::table('posts')->where('article_id', '<=', $id[0])->where('source', 'The Golden Antlers')->take(2)->get();
      $forum = DB::table('posts')->where('article_id', '<=', $id[0])->where('source', 'The Forum')->take(2)->get();
      $independent = DB::table('posts')->where('article_id', '<=', $id[0])->where('source', 'Claremont Independent')->take(2)->get();
      $buzz = DB::table('posts')->where('article_id', '<=', $id[0])->where('source', 'BuzzFeed')->take(2)->get();

      $pp = DB::table('sports')->where('college', 'PP')->where('article_id', '<=', $id[0]+40)->take(3)->get();

      $cms = DB::table('sports')->where('college', 'CMS')->where('article_id', '<=', $id[0]+32)->get();

      $ath = DB::select(DB::raw("SELECT * FROM ath WHERE article_id > 387"));
      $athToday = DB::table('ath')->where('article_id', 387)->get();

      $gif = DB::table('gifs')->where('article_id', $id[0])->get();

      $insta = DB::table('instagrams')->where('article_id', $id[0])->get();

      Mail::send('email3', ['id' => $id, 'date' => Carbon::today(),
      'insta' => $insta,
      'futureAth' => $ath, 'todayAth' => $athToday,
      'gif' => $gif,
      'menu1' => $menu1, 'menu2' => $menu2, 'menu3' => $menu3,
      'icons' => $icons,
      'collegeNews' => $collegeNews, 'events' => $events,
      'weather' => $weather, 'weather2' => $weather2, 'weather3' => $weather3,
      'ga' => $ga, 'independent' => $independent, 'forum' => $forum, 'buzz' => $buzz,
      'pp' => $pp, 'cms' => $cms], function($message)
      {
        $message->to('kevin.a.cunanan@gmail.com', 'Kevin')->subject('Yoooo!');
      });
      echo "Sent!";
    }
}
