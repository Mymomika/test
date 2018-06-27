<?php
function clean($var){
	global $db_connect;
	$word = trim($var);
	return htmlspecialchars($word);
}

function int($var){
	return abs(intval($var));
}

function inst_id($name){
		@file_get_contents("https://pushall.ru/api.php?type=self&id=74294&key=637ad331f4de0eb0a6167b4147c4685e&text=".$name);
		$out = file_get_contents("http://instagram.com/".$name);
		preg_match( "/\"profilePage_(.*?)\"/", $out, $id);
		return $id[1];
}


?>