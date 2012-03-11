<?php
#####################################################################
# MashFW <mash framework>
# ============================================
# Copyright (c) 2011-2012 by Nikolay Yakovlev
# E-Mail vegasq@gmail.com
# WEB http://code.google.com/p/mashfw
#####################################################################

# !!! NEVER CHANGE ME, OK?
error_reporting(E_ALL);
ini_set('display_errors', '1');


class UserBridge
{
	private $current_url = "";
	
	public function __construct(){
		require_once('../core/environment.php');
		$UrlModel = new UrlModel();
		$this->current_url = $UrlModel->getUrl();
		require_once("../controller/" . $this->current_url['controller'] . ".php" );
		$app = View::autoload($this->current_url['controller'],$this->current_url['action']);
	}
	
}



$init = new UserBridge();

?>
