<?php
	// relative directory of the files
	// e.g. https://yoursite.com/files/mixes/*.m4a
	$dir = "/xampp/htdocs/ts-records/files/mixes";
	
	$files = array_diff(scandir($dir), array('.','..','index.php','index.html','TRACKLIST'));  // exclude from scandir
	
    foreach($files as $file)
	{
		$withoutExt = preg_replace('/\.\w+$/', '', $file);
		echo '<a target="_blank" href="./files/mixes/'.$file.'">'.$withoutExt.'</a><br>';
	}
	//TODO: Duration of ID3-Tag
?>