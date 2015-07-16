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
Route::post('/', function() {
  $data = Input::all();
  $subscriber = App\Subscribers::create(['email' => $data['email'], 'college' => $data['college']]);
  $subscriber->save();
  Session::flash('email', $data['email']);
  return view('home');
});

Route::get('/login', function() {
  return view('login');
});
Route::post('/login', function() {
  $data = Input::all();
  $user = App\User::create(['name' => $data['name'], 'college' => $data['college'], 'username' => $data['username'], 'email' => $data['email'], 'password' => $data['password']]);
  $user->save();
  Session::flash('username', $data['username']);
  return view('login');
});
