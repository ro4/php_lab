<?php

/**
 * 给敏感文本加*的方法
 * Cover sensitive string with * symbol
 * 	t*
 *	t**
 *	t**t
 *	测*
 *	测**
 *	测**试
 *	133******33
 *	400000***********00084
 *	起来，******人们！
 */
	echo addAsterisk('te');
	echo "\n";
	echo addAsterisk('tes');
	echo "\n";
	echo addAsterisk('test');
	echo "\n";
	echo addAsterisk('测试');
	echo "\n";
	echo addAsterisk('测试测');
	echo "\n";
	echo addAsterisk('测试测试');
	echo "\n";
	echo addAsterisk('13333333333');
	echo "\n";
	echo addAsterisk('4000000000000000000084');
	echo "\n";
	echo addAsterisk('起来，不愿做奴隶的人们！');
	echo "\n";

    function addAsterisk($string) {
        $pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
        preg_match_all($pa, $string, $t_string);
        $length = count($t_string[0]);
        $quarter = $length / 4;
        foreach ($t_string[0] as $key => $value) {
        	if($key >= $quarter && $key < $quarter*3){
        		$t_string[0][$key] = '*';
        	}
        }
        if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen));
        return join('', array_slice($t_string[0], $start, $sublen));
    }
?>
