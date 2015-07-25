<?php

namespace App\Console\Commands;
use Carbon\Carbon;
use App\Posts;
use DB;

use Illuminate\Console\Command;

class GetBuzzFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'buzzfeed:get';

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
}
