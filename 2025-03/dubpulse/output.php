<?php
$filenames = "file.mp3";
include('mp3file.class.php');
$mp3file = new MP3File($filenames);
$duration = $mp3file->getDuration();
echo $filenames.' ['.MP3File::formatTime($duration).']';
echo '<br>'
?>