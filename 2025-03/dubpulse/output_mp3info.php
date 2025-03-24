<!DOCTYPE html>
output shell with mp3info:
<br><br>
<?php
$song = shell_exec('mp3info -p "%a - %t" C:\xampp\htdocs\dubpulse\files\tracks\*.mp3');
$time = shell_exec('mp3info -p " [%m:%02s]" C:\xampp\htdocs\dubpulse\files\tracks\*.mp3');

$link = '<a href="./files/tracks/'.$song.'.mp3">'.$song.' '.$time.'</a><br><br><br>';

echo $link;
?>