<?php

  require('../simple_html_dom.php');
  $html = file_get_html('http://www.thegoldenantlers.com/');

  $count = 0; //get the first article
  foreach($html->find('article') as $e) {
    while($count < 1) { //while it still hasn't pulled the first article
      echo $e->getAttribute('data-categoryslug');
      foreach($e->find('div[class=post-image]') as $image) {
        foreach($image->find('.info-date') as $date) {
          foreach($date->find('time') as $time) {
            $timeAll = explode(' ', $time->plaintext);
            $month = $timeAll[0]; //month
            $day = substr($timeAll[1], 0,2); //day
            $year = $timeAll[2]; //year
            echo $day.$month.$year;
          }
        }
      }
      foreach($e->find('div[class=post-body]') as $div1) {
        foreach($div1->find('div[class=post-content]') as $div2) {
          foreach($div2->find('p') as $p) {
            echo $p; //description
          }
        }
      }
      foreach($e->find('h3') as $title) {
        echo $title->innertext; //title text
        foreach($title->find('a') as $link) {
          echo $link->href; //link
          $count++;
        }
      }
    }
  }

?>
