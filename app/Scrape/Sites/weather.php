<?php
   $request = 'https://api.forecast.io/forecast/f20be30c718648cfcb5c5b6b8a513c40/34.101655,-117.707591';
   $response  = file_get_contents($request);
   $jsonobj  = json_decode($response);
   echo $response;

?>
