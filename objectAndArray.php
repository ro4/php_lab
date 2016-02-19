<?php
class MyClass {
	public $name = "";
	public $age = 0;

	public function Say(){
		echo 'My name is'.$name.', and I\'m '.$age;
	}
}


$array = array('name' => '', 'age'=>0);

$object = new MyClass();

echo "--------array--------\n";
echo serialize($array);
echo "\n";
echo "--------array--------\n";
echo "--------object--------\n";
echo serialize($object);
echo "\n";
echo "--------object--------\n";
?>