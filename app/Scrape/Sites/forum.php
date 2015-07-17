<?php

  require('../simple_html_dom.php');
  $html = file_get_html('http://cmcforum.com/');

  foreach($html->find('.td-big-grid-post-0') as $e){
    //this is the big first post on the forum
    foreach($e->find('.entry-title') as $f){
      //the title and href inside the picture
      echo $f->plaintext;
      echo "<br>";
      foreach($f->find('a') as $g){
        echo $g->href;
      }
    }
  }

  //no description is available on front page. Maybe use url and create another scraper that pulls first paragraph as description? 

?>
