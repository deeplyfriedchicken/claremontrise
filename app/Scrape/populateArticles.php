<?php
  //only run once a year to create ids for email articles before you can actually do anything.
  require('CarbonRequire.php');
  require('database.php');

  $db = connect();

  $now = date("Y-m-d H:i:s"); //proper created_at / updated_at mysql format

  $begin = new DateTime( '2015-05-01' );
  $end = new DateTime( '2016-05-14' );
  $end = $end->modify( '+1 day' );
  $interval = new DateInterval( 'P1D' );
  $daterange = new DatePeriod( $begin , $interval , $end );

  foreach($daterange as $date){
    $post_date = $date->format("Y-m-d"); //mysql DATE format
    $query = "INSERT INTO email_articles (post_date, file_directory, created_at, updated_at)
    VALUES ( '$post_date', 'not set', '$now', '$now')";
    $res = $db->query($query);
    if($res) {
      //success
      echo "entry for ".$date->format("Y-m-d")." added!".$db->insert_id;
      echo "<br>";
    }
    else {
      die($db->error);
    }
  }

  close($db);
?>
