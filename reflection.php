<?php
class Person{
	public $name;
	public $gender;

	public function say() {
		echo $this->name.", $this->gender.\n";
	}

	public function _set($name, $value) {
		echo "setting $name to $value\n";
		$this->$name = $value;
	}

	public function _get($name) {
		if(!isset($this->$name)) {
			echo "undefined";
			$this->$name = "default";
		}
		return $this->name;
	}
}

$student = new Person();
$student->name = 'fan';
$student->gender = 'male';
$student->age = 24;
var_dump($student);

$reflect = new ReflectionObject($student);
$props = $reflect->getProperties();
foreach ($props as $key => $value) {
	echo $value->getName()."\n";
}

$methods = $reflect->getMethods();
foreach ($methods as $key => $value) {
	echo $value->getName()."\n";
}

var_dump(get_object_vars($student));
var_dump(get_class_vars(get_class($student)));
echo get_class($student)."\n";

//reproduce the class of object
$obj = new ReflectionClass('Person');
$className = $obj->getName();
$methods = $props = array();
foreach($obj->getProperties() as $v) {
	$props[$v->getName()] = $v;
}
unset($v);
foreach ($obj->getMethods() as $v) {
	$methods[$v->getName()] = $v;
}
unset($v);

echo "class $className { \n";
is_array($props) && ksort($props);

foreach ($props as $key => $value) {
	echo "\t";
	echo $value->isPublic() ? 'public' : '' , $value->isPrivate() ? 'private' : '',
		$value->isProtected() ? 'protected' : '', $value->isStatic() ? 'static' : '';
	echo "\t$$key;\n";
}
unset($key,$value);
echo "\n";
if(is_array($methods)) ksort($methods);
foreach ($methods as $key => $value) {
	echo "\t";
	echo $value->isPublic() ? 'public' : '' , $value->isPrivate() ? 'private' : '',
		$value->isProtected() ? 'protected' : '', $value->isStatic() ? 'static' : '';
	echo " function $key() {\n\t}\n";
}
echo "}\n";
?>