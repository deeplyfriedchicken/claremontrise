<?php

  require('../simple_html_dom.php');
  $html = file_get_html('http://www.thegoldenantlers.com/');

  $count = 0; //get the first article
  foreach($html->find('article') as $e) {
    while($count < 1) { //while it still hasn't pulled the first article
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
