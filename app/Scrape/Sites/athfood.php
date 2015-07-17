<?php
  //this website sucks ass

  require('../simple_html_dom.php');
  $html = file_get_html('https://www1.claremontmckenna.edu/mmca/cur_menu.php?iframe');
  $countT = 0;

  foreach($html->find('table[border=1]') as $e) {
    foreach($e->first_child()->find('tr') as $tr) {
      $count = 0;
      foreach($tr->find('td') as $td) {
        if($count == 0) {
          $clean = preg_replace('/\s+/', ' ', $td->plaintext); //clean it because it's messy af
          $timeArray = explode(',', $clean);
          $dayWeek = substr($timeArray[0], 1); //day of week
          $monthDay = explode(' ', $timeArray[1]);
          $month = $monthDay[1]; //month
          $day = $monthDay[2]; //day
          echo $day.$month.$dayWeek;
          echo "<br>";
        }
        if($count == 1) {
          echo $td->plaintext; //food
        }
        $count++;
        echo "<br>";
      }
    }
  }
?>
