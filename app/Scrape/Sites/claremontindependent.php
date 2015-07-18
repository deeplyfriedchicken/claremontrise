<?php
  require('../simple_html_dom.php');
  $html = file_get_html('http://claremontindependent.com/category/campus-news/');

  $count = 0;
  foreach($html->find('body') as $body) {
    foreach($body->find('div[class=hfeed site]') as $div1) {
      foreach($div1->find('div[class=site-content]') as $main) {
        foreach($main->find('article') as $article) {
          while($count < 1) { //only want the first article
            $metaCount = 0;
            foreach($article->find('div[class=entry-meta]') as $meta) {
              if($metaCount == 1) {
                foreach($meta->find('time') as $time) {
                  $dateTime = $time->getAttribute('datetime'); //use this ***********
                }
              }
              $metaCount++;
            }
            foreach($article->find('div[class=entry-content]') as $content) {
              $count2 = 0;
              foreach($content->find('p') as $p) {
                while($count2 < 1) {
                  echo htmlentities( $p->innertext, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8" ); //description
                  $count2++;
                }
              }
            }
            foreach($article->find('header') as $header) {
              foreach($header->find('h1[class=entry-title]') as $entry) {
                echo $entry->innertext; //title
                foreach($entry->find('a') as $link) {
                    echo $link->href; //link
                }
              }
            }
            $count++;
          }
        }
      }
    }
  }

?>
