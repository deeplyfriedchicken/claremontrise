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
  $date2 = $date->addDays(1);
  $email_article = DB::table('email_articles')->where('post_date', '>=', $date)->where('post_date', '<=', $date2)->get();
  $id = $email_article[0]->article_id;
  $users = $users = DB::table('users')->get();
  $events = DB::table('events')->get();
  $weather = DB::table('weather')->where('article_id', '>=', $id)->where('article_id', '<=', $id+2)->get();
  $posts = DB::table('posts')->get();
  return view('template', ['id' => $id, 'date' => Carbon\Carbon::today(), 'weather' => $weather, 'posts' => $posts, 'events' => $events]);
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
