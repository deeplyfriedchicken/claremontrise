<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Carbon\Carbon;
use App\Instagrams;

class GetInstagrams extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'instagram:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets photos around Claremont Colleges.';

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
            echo $description;
            echo "STORED!";
          }
          $count++;
        }
    }
}
