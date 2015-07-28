<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});
Route::post('/', 'SubscriberController@store');

Route::get('/login', function() {
  return view('login');
});
Route::post('/login', 'UserController@store');

Route::get('/cmcevents', 'CollegeNewsAndEventsController@scrapeCmcEvents');
Route::get('/cmcnews', 'CollegeNewsAndEventsController@scrapeCmcNews');
Route::get('/posts/forum', 'CollegePostsController@scrapeForum');
Route::get('/posts/antlers', 'CollegePostsController@scrapeTheGoldenAntlers');
Route::get('/posts/independent', 'CollegePostsController@scrapeClaremontIndependent');
Route::get('/template', function() {
  $date = Carbon\Carbon::today();
  $date1 = substr($date->addDays(1), 0, 10);
  $date2 = substr($date->addDays(1), 0, 10);
  $date3 = substr(Carbon\Carbon::today()->addDays(40), 0, 10);
  $date0 = substr(Carbon\Carbon::today(), 0, 10);
  $id[0] = DB::table('email_articles')->where('post_date', $date0)->value('article_id');
  $id[1] = DB::table('email_articles')->where('post_date', '=', $date1)->value('article_id');
  $id[2] = DB::table('email_articles')->where('post_date', '=', $date2)->value('article_id');
  $id[3] = DB::table('email_articles')->where('post_date', '=', $date3)->value('article_id');
  $events = DB::select(DB::raw("SELECT * FROM events WHERE article_id >= '$id[0]' AND article_id < '$id[3]' AND type = 'event'"));
  $collegeNews = DB::select(DB::raw("SELECT * FROM events WHERE article_id <= '$id[0]'"));
  $weather = DB::table('weather')->where('article_id', $id[0])->get();
  $weather2 = DB::table('weather')->where('article_id', $id[1])->get();
  $posts = DB::table('posts')->where('article_id', '=', $id[0])->where('article_id', '=', $id[1])->where('article_id', '=', $id[2]);
  return view('template', ['id' => $id, 'date' => Carbon\Carbon::today(), 'collegeNews' => $collegeNews, 'weather' => $weather, 'weather2' => $weather2, 'posts' => $posts, 'events' => $events]);
});

Route::get('/weather', 'WeatherController@getWeather');

Route::get('/cms', 'SportsController@scrapeCmsSchedule');
Route::get('/pp', 'SportsController@scrapePPSchedule');

Route::get('/email', 'ArticleController@getAllData');

Route::get('/populate', 'ArticleController@populate');

Route::get('/ath/speakers', 'AthenaeumController@scrapeSpeakers');
Route::get('/ath/food', 'AthenaeumController@scrapeFood');

Route::get('/buzz', 'BuzzFeedController@getXML');
Route::get('/hours', 'FoodHoursController@addHours');
