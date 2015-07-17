<?php
  function connect() {
    $dbhost = 'domain';
    $dbuser = 'user';
    $dbpass = 'pass';
    $dbname = 'dbName';

    $db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    if($db->connect_errno) {
      die("Database connection failed: ".$db->connect_error.$db->connect_errno);
    }
    else {
      return $db;
    }
  }

  function close($db) {
    mysqli_close($db);
  }

?>
