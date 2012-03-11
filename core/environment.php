<?php
#####################################################################
# MashFW <mash framework>
# ============================================
# Copyright (c) 2011-2012 by Nikolay Yakovlev
# E-Mail vegasq@gmail.com
# WEB http://code.google.com/p/mashfw
#####################################################################

// debug
error_reporting(E_ALL);
ini_set('display_errors', 1);

// f.ex. Config::$url
require_once("config.php");


// extends Constructor
require_once("controller.php");

// Files for Model operate push in core/user/
require_once("model.php");
$model = new ModelLoad();

require_once("widget.php");
$widget = new WidgetLoad();

// f.ex. View::render("index",array(1,2,3,4,5,6,7,8,9,0)); 
// for template/t_index.php, second param will be avaliable as $data
require_once("view.php");



// widget example
// TODO FULL REDESIGN OF THIS PART
//require_once("../widgets/menu/widget.php");

// !!! disabled Check action, default = run
//$action = isset($_GET['action']) ? $_GET['action'] : 'run';


?>
