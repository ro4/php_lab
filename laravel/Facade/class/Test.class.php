<?php
class Test
{
	public function method1()
	{
		echo "method1 \n";
	}

	public function method2($arg1, $arg2)
	{
		echo "method2 \n";
		var_dump($arg1);
		var_dump($arg2);
	}
}

?>