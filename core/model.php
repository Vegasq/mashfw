<?php
#####################################################################
# MashFW <mash framework>
# ============================================
# Copyright (c) 2011 by Nikolay Yakovlev
# E-Mail vegasq@gmail.com
# WEB http://code.google.com/p/mashfw
#####################################################################

// extend me in Models 
abstract class Model
{
  public function toString($str){
    return mysql_real_escape_string($str);
  }
  
  public function toInt($int){
    if(is_int($int)) return $int;
    return (int) $int;
  }
  
  public function toArray($result){
    $res = Array();
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
      $res[] = $row;
    }
    return $res;
  }
}

class UrlModel extends Model
{
	
	public function __construct($url=""){
		if(!isset($_GET['url'])){
	    	$url = '';
	    } else {
	    	$url = $_GET['url'];
	    }
		$url = explode("/", $url);
		$this->current_url = $this->check_data($url);
	}
	
	private function check_data($url){
		if(isset($url[0]) && strlen(trim($url[0])) > 0 && $this->isController($url[0])){
			$nonfirst = False;
			$controller = $url[0];
			unset($url[0]);
		} else {
			$nonfirst = True;
			$controller = 'main';
		}
		
		if($nonfirst){
			if(isset($url[0]) && strlen(trim($url[0])) > 0 && $this->isMethod($controller,$url[0])){
				$action = $url[0];
				unset($url[0]);
			} else {
				$action = 'run';
			}
		} else {
			if(isset($url[1]) && strlen(trim($url[1])) > 0 && $this->isMethod($controller,$url[1])){
				$action = $url[1];
				unset($url[1]);
			} else {
				$action = 'run';
			}
		}

		
		
		
		
		$cont_counter = 0;
		$val_counter = 1;
		$data = Array();

		while(count($url) >= 1){
			if(!isset($url[$val_counter]))$url[$val_counter] = '';
			if(!isset($url[$cont_counter]))$url[$cont_counter] = '';
			
			$data[$url[$cont_counter]] = $url[$val_counter];
			unset($url[$cont_counter]);
			unset($url[$val_counter]);
			$cont_counter += 2;
			$val_counter += 2;
		}
		
		return Array(
			'controller' => $controller,
			'action'	=> $action,
			'data'	=> $data
		);
		
	}

	private function isController($name){
		$list = scandir("../controller/");
		unset($list[0]);
		unset($list[1]);

		if( in_array( $name . ".php", $list )){
			return True;
		}
		return False;
	}
	
	private function isMethod($class, $method){
		require_once("../controller/" . $class . ".php");
		$result = method_exists($class,"action_".$method);
		return $result;
	}
	
	public function getUrl(){
		return $this->current_url;
	}
}

class ModelLoad
{
    function __construct(){
	    $dir = scandir("../model/");
	    unset($dir[0]);
	    unset($dir[1]);
	    foreach($dir as $model_file){
			// !!! TODO classkit_import EXPERIMENTAL FUNCTION
			//classkit_import("../model/{$model_file}.php");
			$model_file = str_replace('.php', '', $model_file);
			require_once("../model/{$model_file}.php");
    	}
    }
}


?>