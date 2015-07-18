<?php

  require('../simple_html_dom.php');
  $html = file_get_html('http://www.thegoldenantlers.com/');
  $now = date("Y-m-d H:i:s"); //proper created_at / updated_at mysql format
  $db = connect();

  function doesArticleExist($title, $date, $db)
  {
      $query = "SELECT * FROM email_articles WHERE post_date='$date'";
      $res = $db->query($query);
      $row = $res->fetch_array(MYSQLI_NUM);
      $id = $row[0];
      $query = "SELECT * FROM posts WHERE article_id='$id' AND title='$title';";
      $res = $db->query($query);
      if($res->fetch_array(MYSQLI_NUM) != false){
        return 'exists';
      }
      else {
        return 'none';
      }
  }


  $count = 0; //get the first article
  foreach($html->find('article') as $e) {
    while($count < 1) { //while it still hasn't pulled the first article
      $imgUrl = "none";
      $author = $e->getAttribute('data-categoryslug');
      $author = ucwords(str_replace('-', ' ', $author)); //Capitalizes Author Name
      foreach($e->find('div[class=post-image]') as $image) {
        foreach($image->find('.info-date') as $date) {
          foreach($date->find('time') as $time) {
            $timeAll = explode(' ', $time->plaintext);
            $month = $timeAll[0]; //month
            $day = trim(substr($timeAll[1], 0,2), ','); //day
            $year = $timeAll[2]; //year
            $timestamp = strtotime($day." ".$month." ".$year);
            $date = gmdate("Y-m-d", $timestamp);
          }
        }
      }
      foreach($e->find('div[class=post-body]') as $div1) {
        foreach($div1->find('div[class=post-content]') as $div2) {
          foreach($div2->find('p') as $p) {
            $description = substr(clean(decode($p->plaintext)), 0, 1000); //description needed to decode then remove htmlentities
          }
        }
      }
      foreach($e->find('h3') as $text) {
        $title = clean($text->plaintext); //title text
        $count2 = 0;
        foreach($text->find('a') as $link) {
          while($count2 < 1){
            $url = clean($link->href); //link
            $count2++;
          }
          $count++;
        }
      }
      if(doesArticleExist($title, $date, $db) == 'none') {
        $query = "INSERT INTO posts (article_id, author, title, description, imgUrl, url, source, created_at, updated_at)
         VALUES ((SELECT article_id FROM email_articles WHERE post_date = '$date'), '$author',
         '$title', '$description', '$imgUrl', '$url', 'The Golden Antlers',
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
