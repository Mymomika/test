<?php
function clean($var){
	global $db_connect;
	$word = trim($var);
	return htmlspecialchars($word);
}

function int($var){
	return abs(intval($var));
}

function parser_str ($url)
  {
    //Инициализируем сеанс
    $curl = curl_init();

    //Указываем адрес страницы
    curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt ($curl, CURLOPT_CONNECTTIMEOUT, 2);
	curl_setopt ($curl, CURLOPT_TIMEOUT, 2);
    //Ответ сервера сохранять в переменную, а не на экран   
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($curl, CURLOPT_USERAGENT, 'Mozilla/5.0'); 
    //Переходить по редиректам
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);

    //Выполняем запрос:   
    $result = curl_exec($curl);

      return $result;
}


?>