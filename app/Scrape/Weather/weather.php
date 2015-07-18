<?php
include('lib/forecast.io.php');
require '../database.php';
require '../CarbonRequire.php';
require 'apiWeatherKey.php';

function doesWeatherExist($date, $db)
{
    $query = "SELECT * FROM email_articles WHERE post_date='$date'";
    $res = $db->query($query);
    $row = $res->fetch_array(MYSQLI_NUM);
    $id = $row[0];
    $query = "SELECT * FROM weather WHERE article_id='$id'"; //change this if necessary
    $res = $db->query($query);
    if($res->fetch_array(MYSQLI_NUM) != false){
      return 'exists';
    }
    else {
      return 'none';
    }
}

$now = date("Y-m-d H:i:s"); //proper created_at / updated_at mysql format
$today = date("Y-m-d");
$db = connect();

$api_key = returnApiKey();

$latitude = '34.101655';
$longitude = '-117.707591';
$units = 'auto';  // Can be set to 'us', 'si', 'ca', 'uk' or 'auto' (see forecast.io API); default is auto
$lang = 'en'; // Can be set to 'en', 'de', 'pl', 'es', 'fr', 'it', 'tet' or 'x-pig-latin' (see forecast.io API); default is 'en'

$forecast = new ForecastIO($api_key, $units, $lang);

// all default will be
// $forecast = new ForecastIO($api_key);


/*
 * GET CURRENT CONDITIONS
 */
//$condition = $forecast->getCurrentConditions($latitude, $longitude);


/*
 * GET HOURLY CONDITIONS FOR TODAY
 */
$temperature = $forecast->getForecastToday($latitude, $longitude);
$current_temp = $temperature[0]->getTemperature();



// foreach($conditions_today as $cond) {
//
//     //echo $cond->getTime('H:i:s') . ': ' . $cond->getTemperature(). "\n";
//     //echo "<br>";
//     if($cond->getTemperature() > $hi) {
//       $hi = $cond->getTemperature();
//     }
// }

/*
 * GET DAILY CONDITIONS FOR NEXT 7 DAYS
 */
$conditions_week = $forecast->getForecastWeek($latitude, $longitude);

echo "\n\nConditions this week:\n";
$count = 0;
foreach($conditions_week as $conditions) {
  if($count < 4){
    $date = $conditions->getTime('Y-m-d');
    $hi = $conditions->getMaxTemperature();
    $lo = $conditions->getMinTemperature();
    switch ($conditions->getIcon()) {
      case "clear-day":
        $icon = "wi-day-sunny";
        break;
      case "rain":
        $icon = "wi-rain";
        break;
      case "snow":
        $icon = "wi-snow";
        break;
      case "wind":
        $icon = "wi-day-cloudy-gusts";
        break;
      case "fog":
        $icon = "wi-fog";
        break;
      case "cloudy":
        $icon = "wi-cloudy";
        break;
      case "partly-cloudy-day":
        $icon = "wi-day-cloudy";
        break;
    }
    if(doesWeatherExist($date, $db) == 'none') { //weather needs to be updated given the way I'm processing it...
      if($count != 0) {
        $current_temp = 0;
      }
      $query = "INSERT INTO weather (article_id, icon_today, current_temp, day_max, day_min, created_at, updated_at)
       VALUES ((SELECT article_id FROM email_articles WHERE post_date = '$date'), '$icon',
       '$current_temp', '$hi', '$lo',
       '$now', '$now' )";
      $res = $db->query($query);
      if($res) {
        echo "Stored! ".$db->insert_id;
      }
      else {
        die($db->error);
      }
    }
    else {
      $query = "UPDATE weather SET icon_today='$icon', current_temp='$current_temp', day_max='$hi', day_min='$lo', updated_at='$now'
      WHERE article_id=(SELECT article_id FROM email_articles WHERE post_date = '$date')";
      $res = $db->query($query);
      if($res) {
        echo "Updated! ".$date;
      }
      else {
        die($db->error);
      }
    }
    $count++;
  }
}
