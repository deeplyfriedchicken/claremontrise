<?php

namespace App\Console\Commands;
use Goutte\Client;
use Carbon\Carbon;
use App\Menu;
use DB;

use Illuminate\Console\Command;

class ScrapeMenus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'menu:scrape';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all menus availale.';

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
      $crawler = $client->request('GET', 'https://aspc.pomona.edu/menu/');
      $status_code = $client->getResponse()->getStatus();
      if($status_code==200) {
          echo '200 OK<br>';
      }
      $date = substr(Carbon::today(),0,10);
      $crawler->filter('table')->last()->filter('tr')->each(function ($row) use($date) {
        $count = 0;
        $row->filter('td ul')->each(function ($node, $count) use($date) {
          $diningHall = substr($node->parents()->parents()->attr('id'), 0, -5);
          $node->filter('li')->each(function ($node1) use($count, $diningHall, $date) {
            if($count == 0) {
              $meal = 'breakfast';
            }
            elseif($count == 1) {
              $meal = 'lunch';
            }
            else {
              $meal = 'dinner';
            }
            $food = $node1->text();
            echo "For ".$meal." we have ".$food." at ".$diningHall;
            echo "<br>";
            $count++;
            $store_id = DB::table('stores')->where('short_name', $diningHall)->value('store_id');
            $id = DB::table('email_articles')->where('post_date', $date)->value('article_id');
            if (Menu::where('foodName', $food)->where('meal', '=', $meal)->where('article_id', $id)->where('store_id', $store_id)->exists()) {
              echo $food." already exists for ".$meal." on".$date;
            }
            else {
              $entry = new Menu;
              $entry->article_id = $id;
              $entry->store_id = $store_id;
              $entry->foodName = $food;
              $entry->meal = $meal;
              $entry->save();
              echo $food." saved for ".$diningHall." id ".$store_id;
            }


          });
        });
      });
    }
}
