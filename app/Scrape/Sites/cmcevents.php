<?php

  require('../simple_html_dom.php');
  $html = file_get_html('http://www.cmc.edu/news/events');

  foreach($html->find('div.article') as $e) {
    foreach($e->find('h4') as $event) {
      echo $event->plaintext; //title
      foreach($event->find('a') as $link) {
          echo 'http://www.cmc.edu/'.$link->href; //link
      }
      foreach($e->find('p') as $p) {
        foreach($p->find('span.date-display-start') as $start) {
          echo $start->getAttribute('content'); //start date/time
        }
        foreach($p->find('span.date-display-end') as $end) {
          echo $end->getAttribute('content'); //end date/time
        }
      }

    }
  }



?>
