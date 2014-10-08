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
		$img = '/<img(.*?)src(.*?)="(.*?.jpg)"(.*?)>/';
		preg_match_all($img, $res, $matechs);
	}
	curl_close($curl);
	foreach ($matechs[3] as $key => $value) {
		$size = getimagesize($value);
		if($size[0] > 150 and $size[1] > 150) {
			echo '<img src="'.$value.'">';
		}
	}
?>