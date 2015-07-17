<?php

  require('../simple_html_dom.php');
  $html = file_get_html('http://www.cmc.edu/news/news-releases');

  foreach($html->find('div.view-content') as $e) {
    foreach($e->find('h4') as $event) {
      if($event->prev_sibling() != null) {
        foreach($event->prev_sibling()->find('img') as $img) {
          echo $img->getAttribute('src'); //img src
        }
      }
      echo decode($event->plaintext); //title
      echo "<br>";
      foreach($event->find('a') as $link) {
          echo 'http://www.cmc.edu'.$link->href; //link
          echo "<br>";
      }
      echo decode($event->next_sibling()->next_sibling()); //date needs cleaning
    }
  }



?>
