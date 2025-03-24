<?php
	$dir = "/xampp/htdocs/ts-records/files/fl-projects"; // relative directory of the files
	
	$files = array_diff(scandir($dir), array('.','..','index.php','index.html'));  // exclude from scandir
/*
	function Human_FileSize($bytes, $decimals = 2) {
		$factor = floor((strlen($bytes) - 1) / 3);
		if ($factor > 0) $sz = 'KMGT';
		return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor - 1] . 'B';
	}
*/
    foreach($files as $file)
	{
		$sizepath = $dir.'/'.$file;
		$bytes = filesize($sizepath);
		$size = Human_FileSize($bytes, 1);
		$withoutExt = preg_replace('/\.\w+$/', '', $file);
		echo '<a target="_blank" href="./files/fl-projects/'.$file.'">'.$withoutExt.'</a><font color="#808080">&nbsp;-&nbsp;'.$size.'</font><br>';
	}
?>