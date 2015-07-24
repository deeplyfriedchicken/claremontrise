<?php

namespace App\Console\Commands;
use App\Article;
use Carbon\Carbon;
use DB;

use Illuminate\Console\Command;

class CreateArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'articles:create';

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
}
