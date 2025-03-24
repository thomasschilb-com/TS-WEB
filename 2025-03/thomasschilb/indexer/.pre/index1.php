<?php 
/*
$url = 'https://www.googleapis.com/customsearch/v1?q=schranz';

$body = file_get_contents($url);
$json = json_decode($body);
if ($json->items){
   foreach ($json->items as $item){
      print_r($item);
   }
}
*/

?>
<html>
 <head>
    <title>Google Search</title>
  </head>
  <body>
    <form action="https://www.google.com/search" method="get">
      <input type="text" placeholder="Search">
      <input type="submit" value="Search">
    </form>
  </body>
</html>