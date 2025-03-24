<?php


use Mhor\PhpMp3Info\PhpMp3Info;

$mp3Info = new PhpMp3Info();
$mp3Tags = $mp3Info->extractId3Tags('file.mp3');
echo $mp3Tags->getAlbum();
echo $mp3Tags->getTitle();
echo $mp3Tags->getArtist();
echo $mp3Tags->getTrack();
echo $mp3Tags->getBitrate();
echo $mp3Tags->getLength();

?>