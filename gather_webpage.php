<?php
	$url = 'jandan.net';
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_TIMEOUT, 20);
	$res = curl_exec($curl);
	if(empty($res)){
		echo "something wrong! ";
		var_dump(curl_error($curl));
	} else {
		$href = '/<a(.*)href=(.*)>(.*)<\/a>/'; //抓取链接
		$img = '/<img(.*)src(.*)="(.*.jpg)"(.*)>/';
		preg_match_all($href, $res, $matechs);
		var_dump($matechs);
	}
	curl_close($curl);
?>