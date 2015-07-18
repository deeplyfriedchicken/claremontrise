<?php

  function clean($str) {
    $str = ltrim($str);
    $str = rtrim($str);
    $str = preg_replace("/&#?[a-z0-9]{2,8};/i","",$str);
    return $str;
  }
?>
