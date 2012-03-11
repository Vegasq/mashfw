<?php
#####################################################################
# MashFW <mash framework>
# ============================================
# Copyright (c) 2011 by Nikolay Yakovlev
# E-Mail vegasq@gmail.com
# WEB http://code.google.com/p/mashfw
#####################################################################

// extend me in Models 
abstract class Widget
{

}

class WidgetLoad
{
	function __construct(){
	    $dir = scandir("../widget/");
	    unset($dir[0]);
	    unset($dir[1]);
	    foreach($dir as $widget_file){
			require_once("../widget/" . $widget_file . "/index.php");
    	}
    }
}

?>