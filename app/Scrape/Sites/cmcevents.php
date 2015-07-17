<?php

  require('../simple_html_dom.php');
  $html = file_get_html('http://www.cmc.edu/news/events');
  $now = date("Y-m-d H:i:s"); //proper created_at / updated_at mysql format
  $db = connect();

  foreach($html->find('div.article') as $e) {
    foreach($e->find('h4') as $event) {
      $title = $event->plaintext; //title
      echo $title;
      echo "<br>";
      foreach($event->find('a') as $link) {
          $url = 'http://www.cmc.edu'.$link->href; //link
      }
      foreach($e->find('p') as $p) {
        foreach($p->find('span.date-display-start') as $start) {
          $date1 = substr($start->getAttribute('content'), 0, 10); //start date/time
          $time1 = substr($start->getAttribute('content'), 11, 8); //some weird string thing
          echo $date1;
          echo "<br>";
          echo $time1;
          echo "<br>";
          $dateTime1 = $date1." ".$time1;
        }
        foreach($p->find('span.date-display-end') as $end) {
          $date2 = substr($end->getAttribute('content'), 0, 10); //end date/time
          $time2 = substr($end->getAttribute('content'), 11, 8);
          echo $date2;
          echo "<br>";
          echo $time2;
          echo "<br>";
          $dateTime2 = $date2." ".$time2;
        }
      }
      // need to know if the entry already exists
      $query = "INSERT INTO events (article_id, time1, time2, title, url, type, created_at, updated_at)
       VALUES ((SELECT article_id FROM email_articles WHERE post_date = '$date1'), '$dateTime1', '$dateTime2',
       '$title', '$url', 'event',
       '$now', '$now' )";
      $db->query($query);
      echo $db->error;
    }
  }

  close($db);



?>
