<!DOCTYPE html>
<html>
<head>
<meta content="de" http-equiv="Content-Language">
<LINK REL="ICON" TYPE="IMAGE/X-ICON" HREF="/favicon.ico">
<link rel="icon" type="image/vnd.microsoft.icon" href="/favicon.ico">
<link rel="shortcut icon" href="/favicon.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alumni+Sans+Pinstripe:ital@0;1&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
<title>Sonnensekte</title>
<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Alumni+Sans+Pinstripe:ital@0;1&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap');

a {
	color: #000000;
	text-decoration: none;
}
a:visited {
	color: #808080;
}
a:active {
	color: #808080;
}
a:hover {
	color: #FF9900;
	text-decoration: underline;
}

.alumni-sans-pinstripe-regular {
  font-family: "Alumni Sans Pinstripe", sans-serif;
  font-weight: 400;
  font-style: normal;
}

.alumni-sans-pinstripe-regular-italic {
  font-family: "Alumni Sans Pinstripe", sans-serif;
  font-weight: 400;
  font-style: italic;
}

font {
  font-family: "Alumni Sans Pinstripe", sans-serif;
  font-weight: 600;
  font-style: normal;
  font-size: 23px;
}

.auto-style1 {
	text-align: center;
}
hr {
width: 468px;
border-bottom:thin;
}
.auto-style3 {
	color: #FF9900;
}
.auto-style4 {
	color: #000000;
}
</style>
<base target="_self">
<meta content="sonne, sekte, sonnensekte" name="keywords">
<meta content="Die Sonnensekte" name="description">
</head>
<font>
<?php 
	function human_filesize($bytes, $decimals = 2) {
		$factor = floor((strlen($bytes) - 1) / 3);
		if ($factor > 0) $sz = 'KMGT';
		return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor - 1] . 'B';
	}
?>
<body style="margin: 0; background-color: #FFFFFF">

<table align="center" cellpadding="0" cellspacing="0" style="width: 100%; height: 100%;">
	<tr>
		<td class="auto-style1"><br><br><br>
		<a href="./">
		<img src="title.png" class="auto-style5"></a><br>
		<br>
		<hr class="auto-style4" noshade="noshade" style="width: 651px; height: 1px">
		<br><strong>Tracklist 2025/03<br><br>
<font>
		Genre: Witch Trap / Dark Trap / Phonk 
		/ Dark Ambiente <br>
		<br><?php include('tracks.php'); ?>
</font>
		</strong><br>
<font>
		<span class="auto-style4">Listen to: </span>
		<span class="auto-style3">
		<a target="_blank" href="http://radio.sonnensekte.de:8000">
		Radio Sonnensekte</a></span><br>
<!--		&nbsp;
		<audio controls><source src="http://radio.sonnensekte.de:8000/listen.m4a" type="audio/mp4">
		</audio>
		<audio src="http://radio.sonnensekte.de:8000/listen.m4a" type="audio/x-m4a" controls autoplay >
  <code> Your browser doesn't support audio tags</code>
</audio>
-->
		<br>Use with <a href="https://streamwriter.org/de/" target="_blank">streamWriter</a></font><br><br>
		<hr class="auto-style4" noshade="noshade" style="width: 651px; height: 1px"><br>&copy; 2025 Sonnensekte. Alle Rechte Vorbehalten.<br>
		<br>No. <?php include('no.php'); ?><br>
		<br><br><br></td>
	</tr>
</table>
</body>
</font>
</html>