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

Route::get('/template', 'ArticleController@template');

Route::get('/hours', 'FoodHoursController@addHours');

Route::get('/menu', 'MenuController@scrape5CMenu');
Route::get('/stores', 'StoresController@storeStores');
Route::get('/gif', 'GiphyController@getThisWeeksGifs');
Route::get('/insta', 'InstagramController@getInstagramPhotos');
Route::get('/buzz', 'BuzzFeedController@getXML');
