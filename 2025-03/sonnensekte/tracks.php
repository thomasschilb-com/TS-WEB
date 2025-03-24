<?php
	$dir = "/xampp/htdocs/sonnensekte/dl/tracks"; // relative directory of the files
	
	$files = array_diff(scandir($dir), array('.','..','index.php','index.html','.m4a'));  // exclude from scandir

    foreach($files as $file)
	{
		$sizepath = $dir.'/'.$file;
		$bytes = filesize($sizepath);
		$size = human_filesize($bytes, 1);
		$withoutExt = preg_replace('/\.\w+$/', '', $file);
		echo '<a target="_blank" href="./dl/tracks/'.$file.'">'.$withoutExt.'</a><br>';
	}
?>