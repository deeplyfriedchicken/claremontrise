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
Route::get('/template', 'ArticleController@template');

Route::get('/weather', 'WeatherController@getWeather');

Route::get('/cms', 'SportsController@scrapeCmsSchedule');
Route::get('/pp', 'SportsController@scrapePPSchedule');

Route::get('/email', 'ArticleController@sendEmail');

Route::get('/populate', 'ArticleController@populate');

Route::get('/ath/speakers', 'AthenaeumController@scrapeSpeakers');
Route::get('/ath/food', 'AthenaeumController@scrapeFood');

Route::get('/buzz', 'BuzzFeedController@getXML');
Route::get('/hours', 'FoodHoursController@addHours');

Route::get('/icons', 'WeatherController@weatherIcons');

Route::get('/menu', 'MenuController@scrape5CMenu');
Route::get('/stores', 'StoresController@storeStores');
Route::get('/gifs', 'giphyController@getThisWeeksGifs');
