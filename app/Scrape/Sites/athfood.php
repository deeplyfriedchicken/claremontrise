<?php
  //this website sucks ass

  require('../simple_html_dom.php');
  $html = file_get_html('http://www.cmc.edu/athenaeum/weekly-dinner-menu');
  $countT = 0;

  $element = $html->getElementByTagName('tr');
  echo $element;
?>
