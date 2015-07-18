<?php

  require('../simple_html_dom.php');
  $html = file_get_html('http://www.cmc.edu/news/news-releases');
  $now = date("Y-m-d H:i:s"); //proper created_at / updated_at mysql format
  $db = connect();

  function doesNewsExist($title, $date, $db)
  {
      $query = "SELECT * FROM events WHERE time1='$date' AND title='$title';";
      $res = $db->query($query);
      if($res->fetch_array(MYSQLI_NUM) != false){
        return 'exists';
      }
      else {
        return 'none';
      }
  }

  foreach($html->find('div.view-content') as $e) {
    foreach($e->find('h4') as $event) {
      if($event->prev_sibling() != null) {
        foreach($event->prev_sibling()->find('img') as $img) {
          $src = clean($img->getAttribute('src')); //img src
        }
      }
      $title = decode($event->first_child()->plaintext); //title
      echo $title;
      echo "<br>";
      foreach($event->find('a') as $link) {
          $url = 'http://www.cmc.edu'.$link->href; //link
          echo "<br>";
      }
      $date = $event->next_sibling()->next_sibling()->plaintext;
      $date = substr($date, strpos($date, '•') + 4); //date needs cleaning
      $date = clean($date);
      $timeArray = explode(' ', $date);
      $month = $timeArray[0];
      $day = rtrim($timeArray[1], ',');
      $year = $timeArray[2];
      $timestamp = strtotime($day." ".$month." ".$year);
      $date = gmdate("Y-m-d", $timestamp);
      if(doesNewsExist($title, $date, $db) == 'none') {
        $query = "INSERT INTO events (article_id, time1, title, url, type, created_at, updated_at)
         VALUES ((SELECT article_id FROM email_articles WHERE post_date = '$date'), '$date',
         '$title', '$url', 'news',
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
