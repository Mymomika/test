<?php

function clean($var){
	global $db_connect;
	$word = trim($var);
	return htmlspecialchars($word);
}

function int($var){
	return abs(intval($var));
}

$text = clean($_POST['text']);
$size = (int)$_POST['size'];
$text = preg_split('/\\r\\n?|\\n/', $text);

foreach ($text as $key) {
if(mb_strlen($key) <= $size){
	$out .= $key."\n";
}}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	 <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
	<title>Обрезать строки</title>
		<style type="text/css">.cs{width: 7%; text-align: center; border: 1px solid #292829; border-radius: 3px 3px 0px 0px; padding: 12px 10px; margin: 10px 0px 0px 0px;}</style>
</head>
<body>
	<div id="body-form">
 	<h1>Обрезать строки</h1>

		     <fieldset>
<center><form method="post">
	<textarea style="width: 80%; height: 250px;" name ="text"><?php echo $out;?></textarea><br>
	Количество символов менее: <input class="cs" style="width: 7%" name = "size" size="5"><br/>
	<input style="width: 100px; height: 50px;" type="submit" value="ОК" name="submit">
</form></center>
</fieldset>
</div>
</body>
</html>