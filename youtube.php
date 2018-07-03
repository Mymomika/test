<?php
set_time_limit(0);
ini_set('max_execution_time',0); 
require('function.php');

$texts = clean($_POST['text']);
$texts = preg_split('/\\r\\n?|\\n/', $texts);

foreach ($texts as $video_id) {
preg_match( "/=(.*?)$/", $video_id, $id);
$video_id = $id[1];

$pageToken = "";
	do {
		$youtube_out = parser_str("https://www.googleapis.com/youtube/v3/commentThreads?part=snippet%2Creplies&maxResults=100&pageToken=".$pageToken."&textFormat=html&videoId=".$video_id."&key=AIzaSyBmRw1tJ-hrWKVmXMvzO9kNGbFJ3t1pcDI");
		sleep(1);
		$youtube_out = json_decode($youtube_out, TRUE);
			foreach ($youtube_out["items"] as $text) {
				$out .= $text["snippet"]["topLevelComment"]["snippet"]["textOriginal"]."\n";
			}
		$pageToken = $youtube_out["nextPageToken"];
	} while (isset($youtube_out["nextPageToken"]));
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	 <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
	<title>Вытащить комментарии с youtube</title>
		<style type="text/css">.cs{width: 7%; text-align: center; border: 1px solid #292829; border-radius: 3px 3px 0px 0px; padding: 12px 10px; margin: 10px 0px 0px 0px;}</style>
</head>
<body>
	<div id="body-form">
 	<h1>Вытащить комментарии с youtube</h1>

		     <fieldset>
<center><form method="post">
	<textarea style="width: 80%; height: 250px;" name ="text"><?php echo $out;?></textarea><br>
	<input style="width: 100px; height: 50px;" type="submit" value="ОК" name="submit">
</form></center>
</fieldset>
</div>
</body>
</html>