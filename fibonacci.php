<?php
function fibonacci(){
	$i = 0;
	$j = 1;
	yield $i;
	while (true) {
		$j = $i + $j;
		$i = $j - $i;
		yield $i;
	}
}
$count = 0;
foreach(fibonacci() as $f) {
	$count ++;
	if($count >50) {
		break;
	}
	echo $f."\n";
}
