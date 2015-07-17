<?php

  require('../simple_html_dom.php');
  $html = file_get_html('http://www.cmc.edu/athenaeum/spring-2015-program-calendar');

  foreach($html->find('table') as $table) {
    foreach($table->find('tr') as $speaker) {
      $count = 0;
      foreach($speaker->find('td') as $column) {
        if($count == 0) {
            echo "Date: ".$column->plaintext;
            echo "<br>";
        }
        if($count == 1){
          foreach($column->find('b') as $person) {
            echo $person;
          }
          echo $column;
        }
        echo "<br>";
        $count++;
      }
    }
  }
?>
