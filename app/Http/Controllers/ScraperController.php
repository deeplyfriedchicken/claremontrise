<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use Carbon\Carbon;
use App\EventAndNews;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

function createDate($date) {
  $date = substr($date, strpos($date, '•') + 4); //date needs cleaning
  $date = $date;
  $timeArray = explode(' ', $date);
  $month = $timeArray[0];
  $day = rtrim($timeArray[1], ',');
  $year = $timeArray[2];
  $timestamp = strtotime($day." ".$month." ".$year);
  return $date = Carbon::createFromTimeStamp($timestamp);
}
function createDateAntlers($date) {
  $timeArray = explode(' ', $date);
  $month = $timeArray[0];
  $day = rtrim($timeArray[1], ',');
  $year = $timeArray[2];
  $timestamp = strtotime($day." ".$month." ".$year);
  return $date = Carbon::createFromTimeStamp($timestamp);
}
function getDateAthSpeakers($date) {
  $timeArray = explode(',', $date);
  $date = $timeArray[1];
  $timeArray = explode(' ', $date);
  $month = $timeArray[0];
  $day = $timeArray[1];
  $year = 2015;
  $date = [$year, $month, $day];
  return $date;
}

function trimWhiteSpace($str) {
  $str = rtrim($str);
  $str = ltrim($str);
  return $str;
}
function getArticleId($date) {
  $id = DB::table('email_articles')->where('post_date', $date)->value('article_id');
  return $id;
}
