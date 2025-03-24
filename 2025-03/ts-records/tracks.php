<?php
	$dir = "/xampp/htdocs/ts-records/files/tracks"; // relative directory of the files
	
	$files = array_diff(scandir($dir), array('.','..','index.php','index.html'));  // exclude from scandir
	
    foreach($files as $file)
	{
		$withoutExt = preg_replace('/\.\w+$/', '', $file);
		echo '<a target="_blank" href="./files/tracks/'.$file.'">'.$withoutExt.'</a><br>';
	}
?>