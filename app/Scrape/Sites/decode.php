<?php

  function decode($str) {
    return mb_convert_encoding($str, "HTML-ENTITIES", "UTF-8"); //title
  }

?>
