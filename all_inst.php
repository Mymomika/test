<?php

function clean($var){
	global $db_connect;
	$word = trim($var);
	return htmlspecialchars($word);
}

function int($var){
	return abs(intval($var));
}


switch($_GET['do']){
	default:
		
function inst_id($name){
		@file_get_contents("https://pushall.ru/api.php?type=self&id=74294&key=637ad331f4de0eb0a6167b4147c4685e&text=".$name);
$out = file_get_contents("http://instagram.com/".$name);
preg_match( "/\"profilePage_(.*?)\"/", $out, $id);
return $id[1];
}

function inst_photo($id, $count){
	if($count == FALSE){
		$count = 999999999999;
	}
  $photo = array();
while(count($photo['url']) <= $count){
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.instagram.com/graphql/query/?query_hash=42323d64886122307be10013ad2dcc44&variables=%7B%22id%22%3A%22".$id."%22%2C%22first%22%3A48%2C%22after%22%3A%22".$end."%22%7D&=",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_COOKIE => "rur=FRC; csrftoken=kwir08Bsl7X6EF8OINiSylf27FCBgD5t; mid=Wv2frQAEAAFKzaN_5AMXSo12Udq-; csrftoken=sIjtGEHeVWmTzVdarnIDz9ePT5f3l7B5; shbid=6835; shbts=1526570961.428112; rur=FRC; ds_user_id=967828621; urlgen=%22%7B%5C%22time%5C%22%3A%201526565051%5C054%20%5C%22217.118.83.134%5C%22%3A%2016345%5C054%20%5C%22217.118.83.245%5C%22%3A%2016345%7D%3A1fJKqH%3A4QfVaY1By_-CdMsrEdvE6vMSr_Y%22",
  CURLOPT_HTTPHEADER => array(
    "cookie: csrftoken=sIjtGEHeVWmTzVdarnIDz9ePT5f3l7B5; ds_user_id=967828621; shbid=6835; sessionid=IGSCc690621af743aa6a6d601560805b53e78ae85d94e001af11ca8d7da1e4bebeee%3ANBtYDi2PSkfEG7brqVRGpNWFlOkcTZeM%3A%7B%22_auth_user_id%22%3A967828621%2C%22_auth_user_backend%22%3A%22accounts.backends.CaseInsensitiveModelBackend%22%2C%22_auth_user_hash%22%3A%22%22%2C%22_platform%22%3A4%2C%22_token_ver%22%3A2%2C%22_token%22%3A%22967828621%3AODJPvPoTqAGIuEa2EKlLkYquUswoJlpZ%3Aeeab1e5261dea9c5eef5aed046ba6a938de785d002ee746559c404357890bb8e%22%2C%22last_refreshed%22%3A1526565051.4026958942%7D; shbts=1526569822.249913; rur=FRC; urlgen=\"{\"time\": 1526565051\054 \"217.118.83.134\": 16345\054 \"217.118.83.245\": 16345}:1fJKXu:G0O6DIbU90xdIyMW_2OgiDgfh1o; __lnkrntdmcvrd=-1; mid=WvyFwAALAAH30SpO9zgrWInm7MB4; mcd=3"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$response = json_decode($response, TRUE);

foreach ($response['data']['user']['edge_owner_to_timeline_media']['edges'] as $edges) {
$photo['url'][] = $edges['node']['shortcode'];
$photo['type'][] = $edges['node']['__typename'];
$photo['like'][] = $edges['node']['edge_media_preview_like']['count'];
}

if ($response['data']['user']['edge_owner_to_timeline_media']['page_info']['has_next_page'] == 1 AND $count > count($photo['url'])){
$end = $response['data']['user']['edge_owner_to_timeline_media']['page_info']['end_cursor'];
}else{
$photo['url'] = array_slice($photo['url'], 0, $count);
$photo['type'] = array_slice($photo['type'], 0, $count);
$photo['like'] = array_slice($photo['like'], 0, $count);

return $photo;
}
}}
if ($_POST['submit']){
	$id = inst_id(clean($_POST['name']));
	$photo = inst_photo($id, $_POST['count']);
	$i = 0;
	foreach ($photo['url'] as $key) {
		if ($_POST['rand']){
			$rnd = explode(",", $_POST['rand']);
			@$rand = "&quantity=".rand($rnd[0], $rnd[1])."&link=";
		}else{
			$rand = '';
		}
		if ($_POST['video']){
			if($photo['type'][$i] == "GraphVideo"){
				if($_POST['view']){
					$out = file_get_contents("https://www.instagram.com/p/".$key."?__a=1");
					$out = json_decode($out, TRUE);
					if($_POST['view'] >= $out['graphql']['shortcode_media']['video_view_count']){
						@$text .= $rand."https://www.instagram.com/p/".$key."/\n";
					}


				}else
				@$text .= $rand."https://www.instagram.com/p/".$key."/\n";
			}
		}else{
		if($_POST['like']){
		if($_POST['like'] >= $photo['like'][$i]){
			echo $photo['like'][$i]."\n";
			@$text .= $rand."https://www.instagram.com/p/".$key."/\n";
}
	}else{
		@$text .= $rand."https://www.instagram.com/p/".$key."/\n";	
		}
		}
		$i++;
	}
}
	break;

	case 'comment':
	
function inst_comment($p, $end){
  $comments = array();
  $curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.instagram.com/graphql/query/?query_hash=33ba35852cb50da46f5b5e889df7d159&variables=%7B%22shortcode%22%3A%22".$p."%22%2C%22first%22%3A24%2C%22after%22%3A%22".$end."%22%7D",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_COOKIE => "rur=FRC; csrftoken=kwir08Bsl7X6EF8OINiSylf27FCBgD5t; mid=Wv2frQAEAAFKzaN_5AMXSo12Udq-; csrftoken=sIjtGEHeVWmTzVdarnIDz9ePT5f3l7B5; shbid=6835; shbts=1526570961.428112; rur=FRC; ds_user_id=967828621; urlgen=%22%7B%5C%22time%5C%22%3A%201526565051%5C054%20%5C%22217.118.83.134%5C%22%3A%2016345%5C054%20%5C%22217.118.83.245%5C%22%3A%2016345%7D%3A1fJKqH%3A4QfVaY1By_-CdMsrEdvE6vMSr_Y%22",
  CURLOPT_HTTPHEADER => array(
    "cookie: csrftoken=sIjtGEHeVWmTzVdarnIDz9ePT5f3l7B5; ds_user_id=967828621; shbid=6835; sessionid=IGSCc690621af743aa6a6d601560805b53e78ae85d94e001af11ca8d7da1e4bebeee%3ANBtYDi2PSkfEG7brqVRGpNWFlOkcTZeM%3A%7B%22_auth_user_id%22%3A967828621%2C%22_auth_user_backend%22%3A%22accounts.backends.CaseInsensitiveModelBackend%22%2C%22_auth_user_hash%22%3A%22%22%2C%22_platform%22%3A4%2C%22_token_ver%22%3A2%2C%22_token%22%3A%22967828621%3AODJPvPoTqAGIuEa2EKlLkYquUswoJlpZ%3Aeeab1e5261dea9c5eef5aed046ba6a938de785d002ee746559c404357890bb8e%22%2C%22last_refreshed%22%3A1526565051.4026958942%7D; shbts=1526569822.249913; rur=FRC; urlgen=\"{\"time\": 1526565051\054 \"217.118.83.134\": 16345\054 \"217.118.83.245\": 16345}:1fJKXu:G0O6DIbU90xdIyMW_2OgiDgfh1o; __lnkrntdmcvrd=-1; mid=WvyFwAALAAH30SpO9zgrWInm7MB4; mcd=3"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

$p .= $response;
  preg_match_all( "/[-._a-z0-9]+@(?:[a-z0-9][-a-z0-9]+\.)+[a-z]{2,6}/", $response, $mail_list);
  foreach ($mail_list[0] as $mail) {
    $comments['text'][] = $mail;
  }
$response = json_decode($response, TRUE);
$end = $response['data']['shortcode_media']['edge_media_to_comment']['page_info']['end_cursor'];
$comments['end'] = $end;
return $comments;
}


function inst_comments($p){
  $comment = array();
  $out = file_get_contents("https://www.instagram.com/p/".$p."?__a=1");
  $out = json_decode($out, TRUE);
  $count = $out['graphql']['shortcode_media']['edge_media_to_comment']['count'];
  $count_comm = 0;
  while($count_comm <= $count){
   $count_comm = $count_comm + 24;
  $ends = inst_comment($p, $comment['end']);
  $comment['end'] = $ends['end'];
  foreach ($ends['text'] as $key) {
    $comment['text'][] = $key;
  }}
  return $comment;
}
  


if ($_POST['submit']){
$list_url = explode("\n", $_POST['text']);

foreach ($list_url as $url) {
	$url = preg_match("/p\/(.*?)\//i", $url, $url2);
	$s = inst_comments($url2[1]);

	foreach ($s['text'] as $commentr) {
		$text .= $commentr."\n";
	}
}
}
	break;

}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	 <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
	<title></title>
	<style type="text/css">.cs{width: 7%; text-align: center; border: 1px solid #292829; border-radius: 3px 3px 0px 0px; padding: 12px 10px; margin: 10px 0px 0px 0px;}</style>
</head>
<body>
	<div id="body-form">
<?php if ($_GET['do'] != "comment"){ ?>
<a href="?do=comment" style="color:#fff">
 	<h1>Вытащить почты с комментариев</h1>
 </a>
 <?php }else{ ?>
<a href="/all_inst.php" style="color:#fff">
 	<h1>Сбор публикаций</h1>
 </a>

 <?php } ?>
		     <fieldset>
<center><form method="post">
	<textarea style="width: 80%; height: 250px;" name ="text"><? echo $text;?></textarea><br>
	<?php if ($_GET['do'] != "comment"){ ?>
	Имя пользователя: <input name = "name" class="cs" style="width: 7%">; Количество: <input class="cs" style="width: 7%" name = "count"><br>
	Условие: лайков меньше <input class="cs" style="width: 7%" name = "like" size="5"><br>
	Условие: просмотров меньше <input class="cs" style="width: 7%" name = "view" size="5"><br>
	<input name = "rand" class="cs" style="width: 7%"><br>
		<input type="checkbox" class="cs" style="width: 7%" name="video"/><label>только видео</label><br>
		<?php } ?>
	<input style="width: 100px; height: 50px;" type="submit" value="ОК" name="submit">
</form></center>
</fieldset>
</div>
</body>
</html>
