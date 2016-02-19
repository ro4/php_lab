<?php

class LinkCall {
	protected $demo = 0;

	function __construct($demo = false) {
		if($demo !== false){
			$this->demo = $demo;
		}
	}
	public function __get($demo) {
		return $this->$demo;
	}

	public function __set($demo,$value) {
		echo "this is set \n";
		if(isset($this->$demo)) {
			$this->demo = $value;
			return true;
		} else {
			return false;
		}
	}

	public function __call($method, $args) {
		echo "this is call \n";
		switch ($method) {
			case 'add':
				$this->add();
				break;
			case 'down':
				$this->down();
				break;
			default:
				echo "not found\n";
				break;
		}
		return $this;
	}

	protected function add() {
		echo "this is add \n";
		$this->demo = $this->demo + 1;
	}

	protected function down() {
		echo "this is down \n";
		$this->demo = $this->demo - 1;
	}
}

$myClass = new LinkCall(1);

echo $myClass->demo;
$myClass->demo = 33;
echo $myClass->demo;
$myClass->add()->add()->down()->wtf();
echo $myClass->demo;
?>