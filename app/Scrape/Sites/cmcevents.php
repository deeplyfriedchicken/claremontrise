<?php

  require('../simple_html_dom.php');

  function doesEventExist($title, $dateTime1, $db)
  {
      $query = "SELECT * FROM events WHERE time1='$dateTime1' AND title='$title';";
      $res = $db->query($query);
      if($res->fetch_array(MYSQLI_NUM) != false){
        return 'exists';
      }
      else {
        return 'none';
      }
  }

  $html = file_get_html('http://www.cmc.edu/news/events');
  $now = date("Y-m-d H:i:s"); //proper created_at / updated_at mysql format
  $db = connect();

  foreach($html->find('div.article') as $e) {
    foreach($e->find('h4') as $event) {
      $title = $event->plaintext; //title
      $title = clean($title);
      foreach($event->find('a') as $link) {
          $url = clean('http://www.cmc.edu'.$link->href); //link
      }
      foreach($e->find('p') as $p) {
        foreach($p->find('span.date-display-start') as $start) {
          $date1 = substr($start->getAttribute('content'), 0, 10); //start date/time
          $time1 = substr($start->getAttribute('content'), 11, 8); //some weird string thing
          $dateTime1 = clean($date1." ".$time1);
        }
        foreach($p->find('span.date-display-end') as $end) {
          $date2 = substr($end->getAttribute('content'), 0, 10); //end date/time
          $time2 = substr($end->getAttribute('content'), 11, 8);
          $dateTime2 = clean($date2." ".$time2);
        }
      }
      // need to know if the entry already exists
      if(doesEventExist($title, $dateTime1, $db) == 'none') {
        $query = "INSERT INTO events (article_id, time1, time2, title, url, type, created_at, updated_at)
         VALUES ((SELECT article_id FROM email_articles WHERE post_date = '$date1'), '$dateTime1', '$dateTime2',
         '$title', '$url', 'event',
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
        echo $title." entry already exists";
        echo "<br>";
      }
    }
  }

  close($db);



?>
