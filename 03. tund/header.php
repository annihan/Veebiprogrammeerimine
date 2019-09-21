<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">
  <title>
  <?php
  echo $userName;
  // set the default timezone to use. Available since PHP 5.1
  date_default_timezone_set('UTC');
  // Prints something like: Monday
  echo date("l");
  echo date('l jS \of F Y h:i:s A');
  $weekDaysET = ["esmaspäev", "teisipäev", "kolmapäev", "neljapäev", "reede", "laupäev", "pühapäev"]
  ?>
   programmeerib veebi</title>

</head>
<body>
