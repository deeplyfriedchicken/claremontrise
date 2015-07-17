<?php

  require('../simple_html_dom.php');
  $html = file_get_html('http://www.cmc.edu/athenaeum/spring-2015-program-calendar');

  foreach($html->find('table') as $table) {
    foreach($table->find('tr') as $speaker) {
      $count = 0;
      foreach($speaker->find('td') as $column) {
        if($count == 0) {
          $clean = preg_replace('/\s+/', ' ', $column->plaintext); //clean it because it's messy af
          $timeArray = explode(',', $clean);
          $dayWeek = substr($timeArray[0], 1); //day of week
          $monthDay = explode(' ', $timeArray[1]);
          $month = $monthDay[1]; //month
          $day = $monthDay[2]; //day
          $when = $monthDay[3]." ".$monthDay[4]; //optional not always filled
          echo $day.$month.$dayWeek.$when;
          echo "<br>";
        }
        if($count == 1){
          foreach($column->find('b') as $person) {
            echo $person; // speaker
          }
          echo $column; //description
        }
        echo "<br>";
        $count++;
      }
    }
  }
?>
