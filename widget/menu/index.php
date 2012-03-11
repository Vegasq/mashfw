<?php

class TestWidget extends Widget
{
	private $_data = Array();
	
	public function __construct(){
		$this->_data['menu'] = array(
			"Главная"=>"/",
			"Вторая"=>"/test"
		);
	}
	
	public function draw(){
		$_data = $this->_data;
		require_once("template.php");
	}
}

?>