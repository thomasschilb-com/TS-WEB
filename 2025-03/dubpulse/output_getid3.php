<?php
/*
	include("getid3/getid3.php");
	$filename = 'file.mp3';
	$getID3 = new getID3;
	$file = $getID3->analyze($filename);
	$playtime_seconds = $file['playtime_seconds'];
	echo gmdate("H:i:s", $playtime_seconds);
*/

	$file = 'file.mp3';
    $filepath = './';
    // Discriminate only the audio/video files you want
    if(preg_match('/[^?#]+\.(?:wma|mp3|wav|mp4)/', strtolower($file))){

        // execute ffmpeg form linux shell and grab duration from output
        $result = shell_exec("ffmpeg -i ".$filepath.' 2>&1 | grep -o \'Duration: [0-9:.]*\'');
        $duration = str_replace('Duration: ', '', $result); // 00:05:03.25

        //get the duration in seconds
        $timeArr = preg_split('/:/', str_replace('s', '', $duration[0]));
        $t = $this->_times[$file] = (($timeArr[3])? $timeArr[3]*1 + $timeArr[2] * 60 + $timeArr[1] * 60 * 60 : $timeArr[2] + $timeArr[1] * 60)*1000;

    }
?>