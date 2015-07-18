<?php
  require('../simple_html_dom.php');
  $html = file_get_html('http://claremontindependent.com/category/campus-news/');
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

  $count = 0;
  $imgUrl = 'none';
  foreach($html->find('body') as $body) {
    foreach($body->find('div[class=hfeed site]') as $div1) {
      foreach($div1->find('div[class=site-content]') as $main) {
        foreach($main->find('article') as $article) {
          while($count < 1) { //only want the first article
            $metaCount = 0;
            foreach($article->find('div[class=entry-meta]') as $meta) {
              if($metaCount == 1) {
                $entryTitle = $meta->prev_sibling();
                $title = $entryTitle->plaintext; //title
                foreach($meta->find('time') as $time) {
                  $dateTime = $time->getAttribute('datetime'); //use this ***********
                  $date = substr($dateTime, 0, 10);
                }
                foreach($meta->find('a[rel=author]') as $auth) {
                  $author = $auth->plaintext;
                }
              }
              $metaCount++;
            }
            foreach($article->find('div[class=entry-content]') as $content) {
              $count2 = 0;
              foreach($content->find('p') as $p) {
                while($count2 < 1) {
                  $description = substr(htmlentities( $p->innertext, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8" ), 0, 1000); //description
                  $count2++;
                }
              }
            }
            foreach($article->find('header') as $header) {
              foreach($header->find('h1[class=entry-title]') as $entry) {
                foreach($entry->find('a') as $link) {
                    $url = $link->href; //link
                }
              }
            }
            if(doesArticleExist($title, $date, $db) == 'none') {
              $query = "INSERT INTO posts (article_id, author, title, description, imgUrl, url, source, created_at, updated_at)
               VALUES ((SELECT article_id FROM email_articles WHERE post_date = '$date'), '$author',
               '$title', '$description', '$imgUrl', '$url', 'Claremont Independent',
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
            $count++;
          }
        }
      }
    }
  }

?>
