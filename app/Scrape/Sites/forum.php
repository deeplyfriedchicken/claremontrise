<?php

  require('../simple_html_dom.php');
  $html = file_get_html('http://cmcforum.com/');
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

  foreach($html->find('.td-big-grid-post-0') as $e) {
    $imgUrl = "none";
    //this is the big first post on the forum
    foreach($e->find('.entry-title') as $f) {
      //the title and href inside the picture
      $title = $f->plaintext;
      foreach($f->find('a') as $g) {
        $url = $g->href;
        $html2 = file_get_html($url);
        foreach($html2->find('div.td-post-content') as $content) {
          $count = 0;
          foreach($content->find('p') as $p) {
            while($count < 1) {
              $description = substr(decode( $p->plaintext ), 0, 1000);
              $count++;
            }
          }
        }
      }
      foreach($e->find('div[class=td-module-meta-info]') as $div) {
        foreach($div->find('.td-post-author-name') as $authr) {
          $author = $authr->plaintext;
          $author = rtrim(trim(rtrim($author), "-"));
        }
        foreach($div->find('.td-post-date') as $dateTime) {
          foreach($dateTime->find('time') as $time) {
            $date = substr($time->getAttribute('datetime'), 0, 10);
            echo $date;
          }
        }
      }
    }
    // if(doesArticleExist($title, $date, $db) == 'none') {
    //   $query = "INSERT INTO posts (article_id, author, title, description, imgUrl, url, source, created_at, updated_at)
    //    VALUES ((SELECT article_id FROM email_articles WHERE post_date = '$date'), '$author',
    //    '$title', '$description', '$imgUrl', '$url', 'The Forum',
    //    '$now', '$now' )";
    //   $res = $db->query($query);
    //   if($res) {
    //     echo "Stored! ".$db->insert_id;
    //   }
    //   else {
    //     die($db->error);
    //   }
    // }
    // else {
    //   echo $title." entry already exists";
    //   echo "<br>";
    // }
  }

  //no description is available on front page. Maybe use url and create another scraper that pulls first paragraph as description?

?>
